
<?php
    $con = mysqli_connect('localhost', 'root', '', 'new');
    $username = $_POST['email'];
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $res = mysqli_query($con, "SELECT * FROM user_data WHERE email = '$email'");
    $count = mysqli_num_rows($res);
    if($count>0){
        $otp = rand(00000,99999);
        mysqli_query($con, "UPDATE user_data SET otp = '$otp' WHERE Email = '$email'");
        $to = $username;
        $from = "akshat.20bcs@cmr.edu.com";
        $fromName = "akshat.20bcs@cmr.edu.com";
        $subject = "Otp Authentication";
        $message = "Your otp is : ".$otp;
        $header = "From: akshat.20bcs@cmr.edu.com";
        ini_set("SMTP", "akshat.20bcs@cmr.edu.com");
        ini_set("smtp_port", "587");
        
    }
    
?>
<form action="submitotp.php" method="POST">
    ENTER OTP
    <input type="number" name="checkotp" placeholder="Enter Otp">
    <input type="hidden" name="otp" value="<?php echo $otp; ?>">
    <button type="submit">Verify</button>
</form>