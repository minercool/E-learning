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
$titre = $resultat['title'];
$q1 = $resultat['question_1'];
$q2 = $resultat['question_2'];
$file = $resultat['quiz'];
$quiz = strtok($file, '.');



?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>COURSE</title>
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
      <style>
         body {
         background: linear-gradient(120grad, rgb(100, 57, 134), rgb(152, 174, 213));
         position: absolute;
         width: 100%;
         height: 100%;
         }
      </style>
   </head>
   <body>
      <?php
         $idc = $_GET['idc'];
         $id = $_GET['id'];
         ?>
      <main class="page landing-page" >
      <section class="clean-block features" style="font-size: 18px;"></section>
      <div class="row justify-content-md-center">
      <div class="col-lg-8">
      <h1  class="display-4" align="center" style="color:white;"><?php echo "$titre";?></h1>
      <br><br>
      <div class="card text-right">
         <div class="card-body" >
            <br>
            <h1 align="center"class="text-primary">مكتسبات الدرس‌</h1>
            <br>
            <div class="embed-responsive embed-responsive-16by9">
            <video <?php echo 'src='.$resultat['video'].'' ?> id='myVideo' controls width='50%' height='75%' >
            </div>
            <hr>
            <br>
            <h1 align="center" class="text-primary">أنشطة تدعيمية‌</h1>
            <nav>
               ‌ ‌
               <center><a class="btn btn-outline-success" href="<?php echo $quiz ?>" target="_blank">Start Quiz</a>‌</center>
            </nav>
            ‌
            <hr>
<form method="POST" enctype="multipart/form-data" action="complete_cours.php?idc=<?php echo $idc ?>&id=<?php echo $id ?>">
               <br><br>
               <h1 align="center"class="text-primary">مهارة التعبير الشفوي</h1>
               <div class="card mb-1">
                  <img class="card-img-top mx-auto d-block"  <?php echo 'src='.$resultat['image1'].'' ?> style='height: 20%;width:30%'; alt="Card image cap">
                  <div class="card-body">
                     <p align="center" class="card-text h5"><?php echo $q1; ?></p>
					 
					   <?php include 'voice.php'; ?>

						<center><label class="file-upload btn btn-primary">
                Choose a record <input type="file" name="audio_file" />
						</label></center>

                  </div>
               </div>
			   
               <hr>
               <br><br>
               <h1 align="center"class="text-primary">مهارة التعبير الكتابي</h1>
               <div class="card mb-1">
                  <img class="card-img-top mx-auto d-block"  <?php echo 'src='.$resultat['image2'].'' ?> style='height: 20%;width:30%'; alt="Card image cap">
                  <div class="card-body">
                     <p align="center" class="card-text h5"><?php echo $q2; ?></p>
                     <center>
					 
					 
                        <input type="text" name="r2" id="YourId" value=""  dir="rtl" class="keyboardInput"> 
                        <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
                        <script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script> 
                     </center>
                  </div>
               </div>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <center>
                  <input type='submit' value='respondre' id='myButton' class="btn btn-primary btn-lg">
               </center>
               <br><br>  
            </form>
         </div>
      </div>
      </center>
      <br><br>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
      <script src="assets/js/smoothproducts.min.js"></script>
      <script src="assets/js/theme.js"></script>		 
   </body>
</html>