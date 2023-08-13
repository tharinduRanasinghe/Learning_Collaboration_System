<?php
  $connection = mysqli_connect('localhost','root','','lms');

  //checking the fann_get_total_connection
  if (mysqli_connect_errno()) {
    die('Database connection failed'.mysqli_connect_error());
  }
?>
