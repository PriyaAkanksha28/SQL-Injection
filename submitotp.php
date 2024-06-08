<?php
$con = mysqli_connect('localhost', 'root', '', 'new');
$checkotp=$_POST['checkotp'];
$otp=$_POST['otp'];

if($checkotp=$otp){
    header("Location: welcome.php");
    exit();
}else{
    echo "Incorrect OTP";
}
?>