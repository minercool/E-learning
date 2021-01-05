<?php
session_start();
require_once('config.php');
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
$idc = $_GET['idc'];
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM cours WHERE idc='$idc'");
$resultat = $query->fetch();
$video = $resultat['video'];
$titre = $resultat['title'];
$q1 = $resultat['question_1'];
$q2 = $resultat['question_2'];
?>
<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Cours</title>
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
     <script src="src/recorder.js"></script>
		<script src="src/Fr.voice.js"></script>
    <script src="js/jquery.js"></script>
		<script src="js/app.js"></script>
 </head>
 <script>
 var video = document.getElementById("myVideo");
var button = document.getElementById("myButton")
video.addEventListener("ended", function() {
   button.disabled = false;
}, true);
 </script>

 <body>
<?php
  $idc = $_GET['idc'];
  $id = $_GET['id'];
	echo "<center><h1>".$titre."</h1>
	<br><br><h2>مكتسبات الدرس‌</h2><br><br>
	<video src='".$video."' id='myVideo' controls width='50%' height='75%' ></center><br><br>";
  ?>
  <form method="POST" enctype="multipart/form-data" action="complete_cours.php?idc=<?php echo $idc ?>&id=<?php echo $id ?>">

  <center>
  <br><br><h3>السؤال 1</h3><br><br>
  <?php
  echo "<img src='".$resultat['image1']."' style='height: 400px;width:650px;'><br><br>";
  echo $q1;
  ?>
  <br>
  <?php include 'voice.php'; ?>
  <input type="file" name="audio_file" >

  <br><br><h3>السؤال 2</h3><br><br>
  <?php
  echo "<img src='".$resultat['image2']."' style='height: 400px;width:650px;'><br><br>";
  echo $q2;
  ?>
  <input type='text' name='r2'>
  <input type='submit' value='responde' id='myButton' class='btn btn-primary btn-lg'>

  <br><br><br><br>
  </center>
  </form>
  <?php
?>

 		 <script src="assets/js/jquery.min.js"></script>
		 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
		 <script src="assets/js/smoothproducts.min.js"></script>
		 <script src="assets/js/theme.js"></script>
 </body>
 </html>
