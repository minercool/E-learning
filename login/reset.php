<?php
session_start();
require_once('config.php');

try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<?php

if (isset($_POST['submit']))
{
	
	$code = $code = rand(100000,1000000);
	$email = $_POST['email'];
	$query = $conn->query("SELECT * FROM etudiant WHERE email LIKE '$email'");
	if ($query->fetch() != 0)
	{
	$_SESSION['email'] = $email;
	$conn->query("UPDATE etudiant SET code = '$code' WHERE email LIKE '$email'");
	
	$to = $email;
	
	$subject = "Password reset";
	
	$message = '
	
	<html>
	
	<body>
	
	<h1>Hello</h1>
	
	<p><h3>Looks like your having problem remambering your password here is your <font color="red"> '.$code.' </font><br> now you can use it to reset your password</body></html>';
	
	$headers = "From:Washma <washma@contact.us>\r\n";
	
	$headers .= "Reply-To: washma@contact.us\r\n";
	
	$headers .= "Content-type: text/html\r\n";
	
	mail($to,$subject,$message,$headers);
	
	header("Location: reset/resetCode.php");
	}else
	{
		echo '<div class="alert alert-danger" role="alert"><center>This email <span style=color:blue>'.$email.'</span> doesnt exist!</center></div>';
	}
	
}


					?>
					<span class="login100-form-title">
						Reset account informations
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="reset" name="submit" class="login100-form-btn">
					</div>

					
					<div class="text-center p-t-20">
						<a class="txt2" href="welcome.php">
							Back
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>