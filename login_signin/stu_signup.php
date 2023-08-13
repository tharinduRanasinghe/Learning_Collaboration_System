<?php 
session_start();

	require_once("connection.php");
	require_once("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST") 
    //if user click the post
	{
		//something was posted
		$student_email = $_POST['sid'];
		$student_fname = $_POST['student_fname'];
		$student_lname = $_POST['student_lname'];
        $student_grade = $_POST['grade'];
		$password = $_POST['password1'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if(!empty($student_email) && !empty($password))//if both not empty
		{

			//save to database
			$query = "insert into student_db (sid,student_fname,student_lname, grade,password) values ('$student_email','$student_fname','$student_lname','$student_grade','$hashed_password')";

            $query2 = "insert into users (user_email, user_name, user_pass) values ('$student_email','$student_fname','$hashed_password')";
            
			mysqli_query($con, $query);
            mysqli_query($con, $query2);

			header("Location: stu_login.php");
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
    <title>AUAHA - Student Registration</title>

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

    <!-- Password Check -->
    <script>
    // Function to check Whether both passwords
    // is same or not.
    function checkPassword(form) {
        password1 = form.password1.value;
        password2 = form.password2.value;

        // If password not entered
        if (password1 == '')
            alert("Please enter Password");

        // If confirm password not entered
        else if (password2 == '')
            alert("Please enter confirm password");

        // If Not same return False.    
        else(password1 != password2) {
            alert("\nPassword did not match: Please try again...")
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
                <a href="../html_menu/index.html"><img src="../assets/img/logo.png" width="149" height="42"
                        data-retina="true" alt=""></a>
            </figure>
            <form autocomplete="off" action="" method="post">
                <div class="form-group">

                    <span class="input">
                        <input class="input_field" type="text" id="student_fname" name="student_fname"
                            required="required">
                        <label class="input_label">
                            <span class="input__label-content">Your First Name</span>
                        </label>
                    </span>

                    <span class="input">
                        <input class="input_field" type="text" id="student_lname" name="student_lname"
                            required="required">
                        <label class="input_label">
                            <span class="input__label-content">Your Last Name</span>
                        </label>
                    </span>

                    <span class="input">
                        <input class="input_field" type="email" id="sid" name="sid" required="required">
                        <label class="input_label">
                            <span class="input__label-content">Your Email</span>
                        </label>
                    </span>

                    <div class="form-group">
                        <div class="styled-select">
                            <select class="required" id="grade" name="grade">
                                <option value="" selected>Select Your Grade</option>
                                <option value="Grade 6">Grade 6</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                                <option value="Grade 11">Grade 11</option>
                            </select>
                        </div>
                    </div>

                    <span class="input">
                        <input class="input_field" type="password" id="password1" name="password1" required="required">
                        <label class="input_label">
                            <span class="input__label-content">Your Password</span>
                        </label>
                    </span>

                    <span class="input">
                        <input class="input_field" type="password" id="password2" name="password2" required="required">
                        <label class="input_label">
                            <span class="input__label-content">Confirm Password</span>
                        </label>
                    </span>

                    <div id="pass-info" class="clearfix"></div>
                </div>
                <input type="submit" value="Register to Auaha" class="btn_1 rounded full-width add_top_30">
                <div class="text-center add_top_10">Already have an acccount? <strong><a href="stu_login.php">Sign
                            In</a></strong></div>
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