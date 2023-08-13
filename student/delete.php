<?php
session_start();
?>
<?php require_once './connection.php';
if(!isset($_SESSION['student_id'])) {
    header('Location: home.php');
    exit();
}?>
<?php

if (isset($_GET['sid'], $_GET['grade'], $_GET['courseId'])) {
    $sid = $_GET['sid'];
    $grade = $_GET['grade'];
    $courseId = $_GET['courseId'];

    $query = "delete from studentcourse where sid='$sid' AND grade='$grade' AND courseId='$courseId'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("Location: save.php?sid=" . $sid);
    } else {
        echo 'Please check';
    }
} else {
    header("Location: save.php?sid=" . $sid);
}
