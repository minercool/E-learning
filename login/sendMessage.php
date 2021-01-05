<?php
session_start();
require_once('config.php');
date_default_timezone_set('UTC');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("Location: login_prof.php");
}
if (isset($_POST['send']))
{
  $id = $_GET['id'];
  $message = $_POST['message'];
  $time = date("Y-m-d h:i:sa");
  $query = $conn->query("INSERT INTO messages VALUES('','$id','$message','$time')");
  if ($query)
  {
    header("Location: messageEtudiant.php");
  }else {
    echo "error";
  }
}
?>
<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Update COURSE</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
     <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arizonia">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Han+Sans">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
     <link rel="stylesheet" href="assets/css/smoothproducts.css">
 </head>

 <body>
	<main class="page landing-page">
		<section class="clean-block features" style="font-size: 18px;"></section>
		<div class="row justify-content-md-center">
		  <div class="col-lg-8">
				<h1 class="text-warning text-center" >Send Message</h1><br><br>

			<div class="card text-right">
			  <div class="card-body">
			<form method="POST"  enctype='multipart/form-data'>

			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Message: </label>
			<div class="col-sm-6">
				<textarea class="form-control" id="inputEmail3" name="message" style="height:200px;"></textarea>
			</div>
			</div>



			<input type="submit" name="send" value="Send" class="btn btn-outline-warning">


			</form>
			<!--<a class="btn btn-primary" href="dashboard.php" role="button">return</a>-->
			  </div>
			</div>
		  </div>
		</div>
	</main>
		 <script src="assets/js/jquery.min.js"></script>
		 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
		 <script src="assets/js/smoothproducts.min.js"></script>
		 <script src="assets/js/theme.js"></script>
 </body>
 </html>
