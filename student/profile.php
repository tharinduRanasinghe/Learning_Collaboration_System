<?php
session_start();
?>
<?php
require_once './connection.php';
if (!isset($_SESSION["student_id"])) {
    header('Location: index.php');
    exit();
}
//fetch data to the placeholders
$sid = $_SESSION["student_id"];
$query2 = "SELECT * FROM student_db where sid='$sid'";
$result2 = mysqli_query($connection, $query2);

while ($record = mysqli_fetch_assoc($result2)) {
    $sid = $record['sid'];
    $fname = $record['student_fname'];
     $lname = $record['student_lname'];
}
?>

<?php
if (isset($_POST['update'])) {
    $sid = $_SESSION["student_id"];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

    $query = "update student_db set student_fname='$fname',student_lname='$lname',password='$npassword' where sid='$sid' and password='$cpassword'";
    $result = mysqli_query($connection, $query);

    if (mysqli_affected_rows($connection) == 1) {
        echo '<script type="text/javascript"> alert("Data Updated")</script>';
    } else {
        echo "<a class='nav-link' data-toggle='modal' data-target=#exampleModal'>";
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
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" data-retina="true" alt="" width="163"
                height="36"></a>
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
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                    <a class="nav-link" href="messages.html">
                        <i class="fa fa-fw fa-envelope-open"></i>
                        <span class="nav-link-text">Messages</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                    <a class="nav-link" href="../forum/index.php">
                        <i class="fa fa-fw fa-archive"></i>
                        <span class="nav-link-text">Forum</span>
                    </a>
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

                <?php
echo "<li>";

echo "<h4>" . $_SESSION["student_name"] . "</h4>";
echo "</li>";
?>

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
                <li class="breadcrumb-item active">
                    <a>Update Your Details </a>
                </li>

            </ol>


            <div class="box_general padding_bottom" style="background-color:lavender">
                <form method='post' action='' enctype='multipart/form-data'>

                    <div class="col-md-8 add_top_30" style="background-color:lavender;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $sid ?>">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" name="cpassword"
                                        placeholder="Your current password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="npassword"
                                        placeholder="Your new password or current password">
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn_1 medium" name="update" value="Update">

                    </div>
            </div>
            <!-- /.container-fluid-->

        </div>

        </form>
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