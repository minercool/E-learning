<html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Notification</title>
     <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
     <link rel="stylesheet" href="fonts/simple-line-icons.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arizonia">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Han+Sans">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
     <link rel="stylesheet" href="css/smoothproducts.css">
<style>
body {
  background: linear-gradient(120grad, rgb(100, 57, 134), rgb(152, 174, 213));
  position: absolute;
  width: 100%;
  height: 100%;
}
</style>
</head>
<?php
session_start();
require_once('../config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("Location: login_etudiant.php");
}
$idn = $_GET['idn'];
$id = $_SESSION['id'];
$user = $_SESSION['user'];
$query = $conn->query("SELECT * FROM notifications WHERE idn LIKE '$idn'");
$resultat = $query->fetch();
		echo"<center>";
		echo"<br><br><br><br><br><br><br><br><br>";
		echo'<div class="card text-left" style="width: 60rem;">';
		echo'<div class="card-body">';
		echo"<h2>".$resultat['title']."</h2>";
		echo"<p>".$resultat['content']."</p>";
		echo"<p class='float-right'>".$resultat['time']."</p>";
		echo"</div>";
		echo"</div>";
		echo"<br>";
		echo '<a class="btn btn-warning" href="../dashboard.php?id='.$id.'&user='.$user.'">Return</a>';
		echo"</center>";
 ?>
