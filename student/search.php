
<?php
session_start();
?>
<?php require_once './connection.php';
if(!isset($_SESSION['student_id'])) {
    header('Location: home.php');
    exit();
}?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Ansonika">
        <title>Dashboard</title>

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
            <a class="navbar-brand" href="dashboard.php"><img src="img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
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

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                        <a class="nav-link" href='save.php?sid=" . $sid"'>
                            <i class="fa fa-fw fa-heart"></i>
                            <span class="nav-link-text">My Courses</span>
                        </a>
                    </li>
                         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Grade</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProfile">
            <li><?php
              echo "<a href='search.php?search=6'>6</a>";
              ?>
            </li>
	<li><?php
              echo "<a href='search.php?search=7'>7</a>";
              ?>
            </li>
            <li><?php
              echo "<a href='search.php?search=8'>8</a>";
              ?>
            </li>
            <li><?php
              echo "<a href='search.php?search=9'>9</a>";
              ?>
            </li>
            <li><?php
              echo "<a href='search.php?search=10'>10</a>";
              ?>
            </li>
            <li><?php
              echo "<a href='search.php?search=11'>11</a>";
              ?>
            </li>
          </ul>
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

                    echo "<h4 style='color:blue;' >" . $_SESSION["student_name"] . "</h4>";
                    echo "</li>";
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>


                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
 <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href='index.php'>
                                <span style='color: purple'>
                                    <strong>
                                        Dashboard</strong>
                                </span>


                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href='profile.php'>

                                <span style='color: purple'>
                                    <strong>
                                        Update Profile</strong>
                                </span>


                            </a>
                            <div class="dropdown-divider"></div>
                            <div>

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
                    <li class="breadcrumb-item">
                        <h6>Dashboard</h6>
                    </li>
                </ol>

                <div class="box_general">

                    
                
                    <div class="list_general">
                        <ul>
                            <?php
                            $grade = isset($_GET['search']) ? $_GET['search'] : '';

                            $query2 = "select DISTINCT Subject from course where Grade='$grade'";
                            $result_set2 = mysqli_query($connection, $query2);
                            if ($result_set2) {

                                while ($record = mysqli_fetch_assoc($result_set2)) {
                                    if ($grade == '6') {
                                        echo " <li>
						<figure><img src='img/grade-6.png' alt=''></figure>
						<a href='courses.php?grade=6'><h4>Grade 6</h4></a>";
                                        echo " <p>" . $record['Subject'] . "</p>";

                                        echo " </li>";
                                    } elseif ($grade == '7') {

                                        echo " <li>
						<figure><img src='img/grade-7.png' alt=''></figure>
						<a href='courses.php?grade=7'><h4>Grade 7</h4></a>";
                                        echo " <p>" . $record['Subject'] . "</p>";
                                        echo " </li>";
                                    } elseif ($grade == '8') {

                                        echo " <li>
						<figure><img src='img/grade-8.png' alt=''></figure>
						<a href='courses.php?grade=8'><h4>Grade 8</h4></a>";
                                        echo " <p>" . $record['Subject'] . "</p>";
                                        echo " </li>";
                                    } elseif ($grade == '9') {
                                        echo "<li>
						<figure><img src='img/grade-9.png' alt=''></figure>
						<a href='courses.php?grade=9'><h4>Grade 9</h4></a>";
                                        echo " <p>" . $record['Subject'] . "</p>";
                                        echo " </li>";
                                    } elseif ($grade == '10') {
                                        echo " <li>
						<figure><img src='img/grade-10.png' alt=''></figure>
						<a href='courses.php?grade=10'><h4>Grade 10</h4></a>";
                                        echo " <p>" . $record['Subject'] . "</p>";
                                        echo " </li>";
                                    } elseif ($grade == '11') {
                                        echo "<li>
						<figure><img src='img/grade-11.png' alt=''></figure>
						<a href='courses.php?grade=11'><h4>Grade 11</h4></a>";
                                        echo " <p>" . $record['Subject'] . "</p>";
                                        echo " </li>";
                                    }
                                    
                                }
                            }
                            else{
                                         
                                        
                                        echo "Please enter integer values(6-11) only";
                                        
                                    }
                            
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- /box_general-->

                <!-- /pagination-->
            </div>
            <!-- /container-fluid-->
        </div>
        <!-- /container-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Auaha 2021</small>
                </div>
            </div>
        </footer>
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
                            <span aria-hidden="true">×</span>
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

    </body>
</html>

<?php mysqli_close($connection) ?>


