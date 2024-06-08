<?php
session_start();

$username = "";
$errors = array();

$db = mysql_connect('localhost', 'root', '', 'sql_injection');

if(isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($db, $_POST['Email']);
    $pas
}