<?php 
session_start();

	require_once("connection.php");
	require_once("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST") //if user click the post
	{
		//something was posted
		$teacher_email = $_POST['tid'];
		$teacher_fname = $_POST['teacher_fname'];
		$teacher_lname = $_POST['teacher_lname'];
		$password = $_POST['password1'];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if(!empty($teacher_email) && !empty($password))//if both not empty
		{

			//save to database
			$query = "INSERT INTO teacher_db (teacher_id, teacher_fname, teacher_lname, password) VALUES ('$teacher_email','$teacher_fname','$teacher_lname','$hashed_password')";

			$query2 = "insert into users (user_email, user_name, user_pass) values ('$teacher_email','$teacher_fname','$hashed_password')";

			mysqli_query($con, $query);
            mysqli_query($con, $query2);

			header("Location: tr_login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
    <title>AUAHA - Teacher Registration</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../assets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/vendors.css" rel="stylesheet">
	<link href="../assets/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

		<!-- Password Check -->
        <script>
          
            // Function to check Whether both passwords
            // is same or not.
            function checkPassword(form) {
                password1 = form.password1.value;
                password2 = form.password2.value;
  
                // If password not entered
                if (password1 == '')
                    alert ("Please enter Password");
                      
                // If confirm password not entered
                else if (password2 == '')
                    alert ("Please enter confirm password");
                      
                // If Not same return False.    
                else  (password1 != password2) {
                    alert ("\nPassword did not match: Please try again...")
                    return false;
                }

            }
        </script>

	

</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="../html_menu/index.html"><img src="../assets/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
			<form autocomplete="off" action="" method="post">
				<div class="form-group">

					<span class="input">
					<input class="input_field" type="text" required="required" id="teacher_fname" name="teacher_fname">
						<label class="input_label">
						<span class="input__label-content">Your First Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="text" required="required" id="teacher_lname" name="teacher_lname">
						<label class="input_label">
						<span class="input__label-content">Your Last Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="email" required="required" id="tid" name="tid">
						<label class="input_label">
						<span class="input__label-content">Your Email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" id="password1" name="password1" required="required">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" id="password2" name="password2" required="required">
						<label class="input_label">
						<span class="input__label-content">Confirm password</span>
					</label>
					</span>
					
					<div id="pass-info" class="clearfix"></div>
				</div>
				<input type="submit" value="Register to Auaha" class="btn_1 rounded full-width add_top_30">
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="tr_login.php">Sign In</a></strong></div>
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