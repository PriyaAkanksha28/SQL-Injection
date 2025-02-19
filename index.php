<?php
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "new";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
    die("Unable to connect");
}
if($_POST) {
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    //Making sure that SQL Injection doesn't work
    //$uname = mysqli_real_escape_string($conn, $uname);//test or 1=1
    //$pass = mysqli_real_escape_string($conn, $pass);
    $sql = "SELECT * FROM user_data WHERE email = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $uname;
        header("Location: authentication.php");
        exit();
    } else {
        echo "Incorrect Username/Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Portal</title>
	<style>
		/* Add a global font family and font size */
		body {
			font-family: Arial, sans-serif;
			font-size: 16px;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background-color: #f0f0f0;
		}
		
		/* Center the login form */
		.container {
			width: 300px;
			background-color: #f9f9f9;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		/* Style the input fields */
		input[type=text], input[type=password] {
			width: calc(100% - 32px);
			padding: 12px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
		}
		
		/* Style the submit button */
		input[type=submit] {
			width: 100%;
			padding: 12px;
			margin: 8px 0;
			border: none;
			border-radius: 5px;
			background-color: #4285f4;
			color: white;
			font-size: 16px;
			font-weight: 600;
			cursor: pointer;
		}
		
		/* Add some space between form elements */
		form > * {
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<!-- Wrap the form in a container div -->
	<div class="container">
		<form action method="POST" autocomplete="off">
			<input type="text" name="username" placeholder="Username" /><br />
			<input type="password" name="password" placeholder="********" /><br />
			<input type="submit" name="login" value="LOGIN" />
		</form>
	</div>
</body>
</html>