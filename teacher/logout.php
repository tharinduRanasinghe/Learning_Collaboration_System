<?php
session_start();
if (!isset($_SESSION['teacher_id'])) {
    header('Location: ../html_menu/index.html');
    exit();
} else {
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('Location: ../html_menu/index.html');
    exit();
}
?>

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

