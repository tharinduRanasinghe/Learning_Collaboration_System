<?php

function check_login($con)
{

	if(isset($_SESSION['teacher_id']))
	{

		$id = $_SESSION['teacher_id'];
		$query = "select * from teacher_db where tid = '$id' limit 1";

		$result = mysqli_query($con,$query); //read query
		if($result && mysqli_num_rows($result) > 0)
		{

			$teacher_data = mysqli_fetch_assoc($result); // fetch associate result
			return $teacher_data;
		}
	}


}

function check_stu_login($con)
{

	if(isset($_SESSION['student_id']))
	{

		$id = $_SESSION['student_id'];
		$query = "select * from student_db where sid = '$id' limit 1";

		$result = mysqli_query($con,$query); //read query
		if($result && mysqli_num_rows($result) > 0)
		{

			$student_data = mysqli_fetch_assoc($result); // fetch associate result
			return $student_data;
		}
	}


}
