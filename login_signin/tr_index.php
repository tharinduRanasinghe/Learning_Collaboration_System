<?php 
session_start();

	require_once("connection.php");
	require_once("functions.php");

	$teacher_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $teacher_data['teacher_name']; ?>
</body>
</html>

