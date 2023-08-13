<?php 

  session_start();
  require 'dbconnect.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
        $email = $_POST['loginEmail'];
        $pass = $_POST['loginPass'];
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

		if(!empty($email) && !empty($pass))
		{

			//read from database
			$query = "select * from users where user_email='$email'";
			$result = mysqli_query($conn, $query);


				if(mysqli_num_rows($result) == 1)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if(password_verify($pass, $hashed_password))
					{

						$_SESSION['user_email'] = $user_data['user_email'];
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['sno']= $user_data['sno'];
						header("Location: ../index.php");
						die;
					}
				}
			
            echo'
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <div class="jumbotron mx-5 my-4">
            <h1 class="display-4">Wrong Username or Password</h1>
            <p class="lead">Make sure you have entered the Email and Password Correctly</p>
            <hr class="my-4">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="../../forum/index.php" role="button">Go to Forum</a>
            </p>
          </div>';
		}else{
			echo '            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <div class="jumbotron mx-5 my-4">
            <h1 class="display-4">Wrong Username or Password</h1>
            <p class="lead">Make sure you have entered the Email and Password Correctly</p>
            <hr class="my-4">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="../../forum/index.php" role="button">Go to Forum</a>
            </p>
          </div>';

		}
	}

?>