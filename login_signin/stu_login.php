<?php 

session_start();

	require_once("connection.php");
	//require_once("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$student_email = $_POST['email'];
		$password = $_POST['password'];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		 
		if(!empty($student_email) && !empty($password))
		{
			
			//read from database
			$query = "select * from student_db where sid = '$student_email'";
			$result = mysqli_query($con, $query);
			
				if(mysqli_num_rows($result) == 1)
				{
				
					$student_data = mysqli_fetch_assoc($result);
					
					if(password_verify($password, $hashed_password))
					{

						$_SESSION['student_id'] = $student_data['sid'];
						$_SESSION['loggedin'] = true;
						$_SESSION['student_name'] = $student_data['student_fname'];
						header("Location: ../student/dashboard.php");
						

						die;
					}

				}
			
		}
		else
		{
			echo "wrong username or password!";
		}
		
		
	} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AUAHA Collaborative Learning">
    <title>AUAHA - Student Login</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="../assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="../assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="../assets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/vendors.css" rel="stylesheet">
    <link href="../assets/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../assets/css/custom.css" rel="stylesheet">

</head>

<body id="login_bg">

    <nav id="menu" class="fake_menu"></nav>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->

    <div id="login">
        <aside>
            <figure>
                <a href="../html_menu/index.html"><img src="../assets/img/logo.png" width="149" height="42"
                        data-retina="true" alt=""></a>
            </figure>

            <form action="" method="post">

                <div class="form-group">
                    <span class="input">
                        <input class="input_field" type="email" autocomplete="off" name="email" id="email">
                        <label class="input_label">
                            <span class="input__label-content">Your email</span>
                        </label>
                    </span>

                    <span class="input">
                        <input class="input_field" type="password" autocomplete="new-password" name="password"
                            id="password">
                        <label class="input_label">
                            <span class="input__label-content">Your password</span>
                        </label>
                    </span>

                </div>
                <input type="submit" value="Login to Auaha" class="btn_1 rounded full-width add_top_30">
                <div class="text-center add_top_10">New to Auaha? <strong><a href="stu_signup.php">Sign up!</a></strong>
                </div>
            </form>
            <div class="copy">© 2021 AUAHA</div>
        </aside>
    </div>
    <!-- /login -->

    <!-- COMMON SCRIPTS -->
    <script src="../assets/js/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/common_scripts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/assets/validate.js"></script>

</body>

</html>