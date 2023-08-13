<?php
session_start();
?>
<?php require_once './connection.php';
if(!isset($_SESSION['teacher_id'])) {
    header('Location: home.php');
    exit();
}

//add quiz
if(isset($_POST['addQuiz'])) {
$tid=$_SESSION['teacher_id'];
$title = $_POST['title'];
$cid = $_POST['cid'];
$total = $_POST['total'];
$mpq = $_POST['mpq'];
$time = $_POST['time'];
$tag = $_POST['tag'];
$eid=uniqid();
$q3=mysqli_query($connection,"INSERT INTO quiz(eid,title,cid,tid,total,mpq,time,tag,date) VALUES  ('$eid','$title','$cid','$tid' , '$total' ,'$mpq', '$time','$tag', NOW())");

header("location:addQuiz.php?q=4&step=2&cid=$cid&eid=$eid&n=$total");
}

//add question
if(isset($_POST['addQns'])) {
$ch=4;
$cid=$_GET['cid'];
$n=$_GET['n'];

for($i=1;$i<=$n;$i++){
$eid=$_GET['eid'];
$qid=uniqid();
$qns=$_POST['qns'.$i];
$q3=mysqli_query($connection,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];

$qa=mysqli_query($connection,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($connection,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($connection,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($connection,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($connection,"INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
header("location:addQuiz.php?q=5");
}


//remove quiz

if(@$_GET['q']== 'rmquiz') {
$eid=@$_GET['eid'];
$result = mysqli_query($connection,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];


$r1 = mysqli_query($connection,"DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($connection,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($connection,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($connection,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
//$r4 = mysqli_query($connection,"DELETE FROM history WHERE qid='$qid' ") or die('Error');

header("location:addQuiz.php?q=5&eid=".$eid);
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Exam Details</title>

    <!-- Favicons-->
    <link rel="apple-touch-icon" type="image/x-icon" href="../assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="../assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="../assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="../assets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- Bootstrap core CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="../assets/css/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../assets/vendor/dropzone.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="../assets/css/custom.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand"><img src="../assets/img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                    <a class="nav-link" href="../forum/index.php">
                        <i class="fa fa-fw fa-archive"></i>
                        <span class="nav-link-text">Forum</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-gear"></i>
                        <span class="nav-link-text">Exams</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="addQuiz.php?q=5">View</a>
                        </li>
                        <li>
                            <a href="addQuiz.php?q=4">Add</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                    <a class="nav-link" href='grades.php'>
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Courses</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>


                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">



                        <a class="dropdown-item" href='dashboard.php'>
                            <span class="text-success">
                                <strong>
                                    Dashboard</strong>
                            </span>


                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href='profile.php'>

                            <span class="text-danger">
                                <strong>
                                    Update Profile</strong>
                            </span>


                        </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">

                <span class="title1" style="margin-left:40%;font-size:30px;"><b>Exam Details</b></span><br /><br />


            </ol>


            <?php
                //show my quizes
                if(@$_GET['q']==5) {
                  $tid=$_SESSION['teacher_id'];
                $result = mysqli_query($connection,"SELECT * FROM quiz where tid='$tid' ORDER BY date DESC") or die('Error');
                echo  '<div class="box_general">
            			<div class="list_general">
                  <div class="panel"><div><p>TPQ : Time Per Question</p></div><div class="table-responsive"><table class="table table-striped title1">
                <tr><td><b>Course Id</b></td><td><b>Topic</b></td><td><b>Total questions</b></td><td><b>Total Marks</b></td><td><b>TPQ</b></td><td></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                	$title = $row['title'];
                	$total = $row['total'];
                	$mpq = $row['mpq'];
                  $tpq= $row['time'];
                  $cid= $row['cid'];

                	echo "<tr><td>".$cid."</td><td>".$title."</td><td>".$total."</td><td>".$mpq*$total."</td><td>".$tpq."</td>
                	<td><li style='color:white;'><a href='addQuiz.php?q=rmquiz&eid=". $row['eid']."' class='btn_1 gray delete'><i class='fa fa-fw fa-times-circle-o'></i>Remove</a></li>";

                }
                echo '</table></div></div></div></div>';

                }
                ?>

            <?php
                //show my student performance
                if(@$_GET['q']==9) {
                  $tid=$_SESSION['teacher_id'];
                $result = mysqli_query($connection,"SELECT * from quiz q inner join rank r on q.eid=r.eid inner join course c on r.cid=c.CourseId where c.TId='$tid'") or die('Error');
                echo  '<div class="box_general">
            			<div class="list_general">
                  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                <tr><td><b></b></td><td><b>Student Id</b></td><td><b>Course Id</b></td><td><b>Grade</b></td><td><b>Quiz Title</b></td><td><b>Marks</b></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                	$sid = $row['Sid'];
                  $cid= $row['cid'];
                  $fullMarks = $row['fullMarks'];
                	$score = $row['score'];
                	$title = $row['title'];
                  $grade = $row['Grade'];

                	echo "<tr><td>".$c++."</td><td>".$sid."</td><td>".$cid."</td><td>".$grade."</td><td>".$title."</td><td>".$score."/".$fullMarks."</td>";

                }
                $c=0;
                echo '</table></div></div></div></div>';

                }
                ?>






            <?php
                //Questions details fill
                if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
                  echo  " <div class='box_general padding_bottom'>
                    <form method='post' action='' enctype='multipart/form-data'>";
                    for($i=1;$i<=$_GET['n'];$i++)
                    {
                    echo "<div class='col-md-8 add_top_30'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>";

                              echo "  <label><h4>Question number&nbsp;".$i."&nbsp;:</h4></><br /><!-- Text input--></label>
                                    <textarea rows='3' cols='5' name='qns".$i."' class='form-control' placeholder='Write question number ".$i." here...'></textarea>
                                </div>
                            </div>

                        </div>
                        <!-- /row-->
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='col-md-12 control-label' for='".$i."1'></label>
                                    <input id='".$i."1' name='".$i."1' placeholder='Enter option a' class='form-control' type='text'>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='col-md-12 control-label' for='".$i."1'></label>
                                    <input id='".$i."1' name='".$i."2' placeholder='Enter option b' class='form-control' type='text'>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='col-md-12 control-label' for='".$i."1'></label>
                                    <input id='".$i."1' name='".$i."3' placeholder='Enter option c' class='form-control' type='text'>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='col-md-12 control-label' for='".$i."1'></label>
                                    <input id='".$i."1' name='".$i."4' placeholder='Enter option d' class='form-control' type='text'>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                        <b>Correct answer</b>:<br />
                        <select id='ans".$i."'' name='ans".$i."'' placeholder='Choose correct answer' class='form-control' >
                           <option value='a'>Select answer for question ".$i."</option>
                          <option value='a'>option a</option>
                          <option value='b'>option b</option>
                          <option value='c'>option c</option>
                          <option value='d'>option d</option> </select><br /><br />

                      </div>
</div>
                  </div>



                    </div>";
                  }

                    echo "<input type='submit' class='btn_1 medium' name='addQns' value='Submit'>

                </div>
              </div>

          </form>
      </div>";
    }
      ?>


            <?php
      //Quiz Details fill
      if(@$_GET['q']==4 && !(@$_GET['step']) ) {
    echo  "<div class='box_general padding_bottom'>
                    <form method='POST' action='' enctype='multipart/form-data'>

                    <div class='col-md-8 add_top_30'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>Quiz title</label>
                                    <input type='text' class='form-control' name='title' placeholder='Enter Quiz title'>
                                </div>
                            </div>

                        </div>
                        <!-- /row-->
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>Course id</label>
                                    <input type='text' class='form-control' name='cid' placeholder='Enter Course Id'>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>Total number of questions</label>
                                    <input type='text' class='form-control' name='total' placeholder='Enter no. of questions'>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>Marks for a question</label>
                                    <input type='text' class='form-control' name='mpq' placeholder='Enter marks on right answer'>
                                </div>
                            </div>

                        </div>

                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>Time allocated</label>
                                    <input type='text' class='form-control' name='time' placeholder='time per question in minutes'>
                                </div>
                            </div>

                        </div>

                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>Tag for searching</label>
                                    <input type='text' class='form-control' name='tag' placeholder='Enter #tag which is used for searching'>
                                </div>
                            </div>

                        </div>

                        <input type='submit' class='btn_1 medium' name='addQuiz' value='Add'>

                    </div>
                </div>
                <!-- /.container-fluid-->

            </div>

        </form>
    </div>";
  }
?>
        </div>
        <!-- /box_general-->

        <!-- /.container-fluid-->



        <!-- /row-->


        <!-- /.container-wrapper--
<!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Ã—</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>
        <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="../assets/vendor/jquery.selectbox-0.2.js"></script>
        <script src="../assets/vendor/retina-replace.min.js"></script>
        <script src="../assets/vendor/jquery.magnific-popup.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../assets/js/admin.js"></script>
        <!-- Custom scripts for this page-->
        <script src="../assets/vendor/dropzone.min.js"></script>

</body>

</html>
<?php mysqli_close($connection) ?>