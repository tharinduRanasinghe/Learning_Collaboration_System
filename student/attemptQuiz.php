<?php
session_start();
?>
<?php require_once './connection.php';

if(!isset($_SESSION['student_id'])) {
    header('Location: home.php');
    exit();
}

//quiz start
if(@$_GET['q']== 'q' && @$_GET['step']== 2) {
$sid=$_SESSION['student_id'];
$cid=@$_GET['cid'];
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$tpq=@$_GET['tpq'];
if (isset($_POST['ans'])) {
  $ans=$_POST['ans'];
}else{
  $ans='';
}
$qid=@$_GET['qid'];
$fullMarks=@$_GET['fullMarks'];

$q=mysqli_query($connection,"SELECT * FROM answer WHERE qid='$qid' " );
while($row=mysqli_fetch_array($q) )
{
$ansid=$row['ansid'];
}
if($ans == $ansid)
{
$q=mysqli_query($connection,"SELECT * FROM quiz WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) )
{
$mpq=$row['mpq'];
}

if($sn == 1)
{
$q=mysqli_query($connection,"INSERT INTO history VALUES('$sid','$eid' ,'0','0','0','0',NOW())")or die('Error');
}
$q=mysqli_query($connection,"SELECT * FROM history WHERE eid='$eid' AND Sid='$sid' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['right'];
}
$r++;
$s=$s+$mpq;
$q=mysqli_query($connection,"UPDATE `history` SET `score`=$s,`level`=$sn,`right`=$r, date= NOW()  WHERE  Sid = '$sid' AND eid = '$eid'")or die('Error124');


}
else
{
if($sn == 1)
{
$q=mysqli_query($connection,"INSERT INTO history VALUES('$sid','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
}
$q=mysqli_query($connection,"SELECT * FROM history WHERE eid='$eid' AND Sid='$sid'" )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$q=mysqli_query($connection,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  Sid = '$sid' AND eid = '$eid'")or die('Error147');
}

if($sn != $total)
{
$sn++;
header("location:attemptQuiz.php?q=quiz&step=2&cid=$cid&eid=$eid&n=$sn&t=$total&totalMarks=$tot&fullMarks=$fullMarks&tpq=$tpq")or die('Error152');
}

else if(isset($_SESSION['student_id']))
{
$q=mysqli_query($connection,"SELECT score FROM history WHERE eid='$eid' AND Sid='$sid'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($connection,"SELECT * FROM rank WHERE Sid='$sid' and eid='$eid'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($connection,"INSERT INTO rank VALUES('$eid','$sid','$cid','$s','$fullMarks',NOW())")or die('Error165');
}
else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$s+$sun;
$q=mysqli_query($connection,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE Sid= '$sid' and eid='$eid'")or die('Error174');
}
header("location:attemptQuiz.php?q=result&cid=$cid&eid=$eid&fullMarks=$fullMarks&tpq=$tpq");
}

else
{
header("location:attemptQuiz.php?q=result&eid=$eid&cid=$cid&fullMarks=$fullMarks");
}

}

?>


<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Ansonika">
        <title>Update Profile</title>

        <!-- Favicons-->
        <link rel="apple-touch-icon" type="image/x-icon" href="../assets/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../assets/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../assets/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../assets/img/apple-touch-icon-144x144-precomposed.png">

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
        <!-- Exam timer styles -->
        <link href="../assets/css/TimeCircles.css" rel="stylesheet">

    </head>

    <body class="fixed-nav sticky-footer" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
            <a class="navbar-brand"><img src="../assets/img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-gear"></i>
                            <span class="nav-link-text">Exams</span>
                          </a>
                          <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                              <a href="attemptQuiz.php?q=5">View</a>
                            </li>
                			<li>
                              <a href="attemptQuiz.php?q=4">Results</a>
                            </li>
                          </ul>
                        </li>

                   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                        <a class="nav-link" href='save.php?sid=" . $sid"'>
                            <i class="fa fa-fw fa-heart"></i>
                            <span class="nav-link-text">My Courses</span>
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
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
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
                        </div>
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

                        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Exams Details</b></span><br /><br />
                </ol>



                <!--quiz start-->
                <?php
                if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {

                  echo '  <script type="text/javascript">
                            window.history.forward();
                            </script>
                          ';

                $GLOBALS['cid']=@$_GET['cid'];
                $GLOBALS['eid']=@$_GET['eid'];
                $GLOBALS['sn']=@$_GET['n'];
                $GLOBALS['total']=@$_GET['t'];
                $GLOBALS['fullMarks']=@$_GET['fullMarks'];
                $GLOBALS['tpq']=@$_GET['tpq'];

                echo '<div class="panel" style="margin:5%">';
                echo "<div id='examTimer' data-timer='".($tpq*60)."' style='max-width:400px; width:100%; height:150px;float: right;'></div>";


                $q=mysqli_query($connection,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );


                while($row=mysqli_fetch_array($q) )
                {
                $qns=$row['question'];
                $GLOBALS['qid']=$row['qid'];
                echo '<b><h4>Question &nbsp;'.$sn.'&nbsp;:</h4><br />'.$qns.'</b><br /><br />';
                }
                $q=mysqli_query($connection,"SELECT * FROM options WHERE qid='$qid' " );
                echo '<form action="attemptQuiz.php?q=q&step=2&cid='.$cid.'&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'&fullMarks='.$fullMarks.'&tpq='.$tpq.'" method="POST"  class="form-horizontal">
                <br />';

                while($row=mysqli_fetch_array($q) )
                {
                $option=$row['option'];
                $optionid=$row['optionid'];
                echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
                }
                echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';

                }
                ?>



                <?php
                //result display
                if(@$_GET['q']== 'result' && @$_GET['eid'])
                {

                $eid=@$_GET['eid'];
                $sid=$_SESSION['student_id'];
                $q=mysqli_query($connection,"SELECT * FROM history WHERE eid='$eid' AND Sid='$sid' " )or die('Error157');
                echo  '<div class="panel">
                <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                while($row=mysqli_fetch_array($q) )
                {
                $s=$row['score'];
                $w=$row['wrong'];
                $r=$row['right'];
                $qa=$row['level'];
                echo '<tr><td>Total Questions</td><td>'.$qa.'</td></tr>
                      <tr><td>No. of right answers&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr>
                	  <tr><td>No. of Wrong answers&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                	  <tr style="color:#990000"><td>Marks&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                }
                echo '</table></div>';

                }

                ?>



                <?php
                //quizes display
                if(@$_GET['q']==5) {
                  $sid=$_SESSION['student_id'];
                $result = mysqli_query($connection,"SELECT * FROM quiz q inner join course c on q.cid=c.CourseId where q.cid in (select CourseId from studentcourse where Sid='$sid' ) ORDER BY q.date DESC") or die('Error');
                echo  '<div class="box_general">
            			<div class="list_general">
                  <div class="panel"><div><p>TPQ : Time Per Question</p></div><div class="table-responsive"><table class="table table-striped title1">
                <tr><td><b>Course Id</b></td><td><b>Grade</b></td><td><b>Topic</b></td><td><b>Total questions</b></td><td><b>Total Marks</b></td><td><b>TPQ</b></td><td></td></tr>';
                while($row = mysqli_fetch_array($result)) {
                  $eid=$row['eid'];
                  $cname = $row['CourseName'];
                  $grade = $row['Grade'];
                	$title = $row['title'];
                	$total = $row['total'];
                	$mpq = $row['mpq'];
                  $fullMarks=$total*$mpq;
                  $cid = $row['CourseId'];
                  $tpq=$row['time'];
                  $q12=mysqli_query($connection,"SELECT score FROM history WHERE eid='$eid' AND Sid='$sid'" )or die('Error98');
                  $rowcount=mysqli_num_rows($q12);
                  if($rowcount == 0){
                	echo "<tr><td>".$cid."</td><td>".$grade."</td><td>".$title."</td><td>".$total."</td><td>".$mpq*$total."</td><td>".$tpq."</td>
                	<td><li style='color:white;'><a href='attemptQuiz.php?q=quiz&step=2&cid=".$row['cid']."&eid=".$row['eid']."&n=1&t=$total&fullMarks=$fullMarks&tpq=$tpq' class='btn_1 gray approve'><i class='fa fa-fw fa-check-circle-o'></i>Attempt</a></li></td>";
                }else {
                  echo "<tr><td>".$cid."</td><td>".$grade."</td><td>".$title."</td><td>".$total."</td><td>".$mpq*$total."</td><td>".$tpq."</td><td></td>";

                }
                }
                $c=0;
                echo '</table></div></div></div></div>';

              }
                ?>



                <?php
                //my overall results
                if(@$_GET['q']==4) {
                  $sid=$_SESSION['student_id'];
                $result = mysqli_query($connection,"SELECT * FROM rank r inner join quiz q on r.eid=q.eid inner join course c on q.cid=c.CourseId where r.Sid='$sid' ORDER BY r.time DESC") or die('Error');
                echo  '<div class="box_general">
            			<div class="list_general">
                  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                <tr><td><b>Course Id</b></td><td><b>Course Name</b></td><td><b>Grade</b></td><td><b>Topic</b></td><td><b>Marks</b></td><td></td></tr>';
                while($row = mysqli_fetch_array($result)) {
                  $cid = $row['cid'];
                  $cname = $row['CourseName'];
                  $grade = $row['Grade'];
                	$title = $row['title'];
                  $mpq = $row['mpq'];
                  $total = $row['total'];
                	$score = $row['score'];


                	echo "<tr><td>".$cid."<td>".$cname."</td><td>".$grade."</td><td>".$title."</td><td>".$score."/".$mpq*$total."</td>";

                }
                $c=0;
                echo '</table></div></div></div></div>';

              }
                ?>



              </div>
  <!-- /row-->


<!-- /.container-wrapper--
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- Custom scripts for all pages-->
<script src="../assets/js/TimeCircles.js"></script>
<!-- Custom scripts for this page-->
<script src="../assets/vendor/dropzone.min.js"></script>

<?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2){
echo '<script>
$(document).ready(function(){

  window.history.pushState(null, "", window.location.href);
  window.onpopstate = function() {
      window.history.pushState(null, "", window.location.href);
  };

  $("#examTimer").TimeCircles({
    time:{
      Days:{
        show: false
      },
      Hours:{
        show: false
      }
    }
  });

  setInterval(function(){
    var remaining_second = $("#examTimer").TimeCircles().getTime();
    if(remaining_second < 1)
    {
      location.replace("attemptQuiz.php?q=q&step=2&cid='.$cid.'&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'&fullMarks='.$fullMarks.'&tpq='.$tpq.'");
    }
  }, 1000);


});



</script>';

}

?>


</body>
</html>
<?php mysqli_close($connection) ?>
