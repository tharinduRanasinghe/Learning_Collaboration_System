<?php 
session_start();

	require_once("connection.php");
	require_once("functions.php");

	$student_data = check_stu_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $student_data['student_name']; ?>
</body>
</html>