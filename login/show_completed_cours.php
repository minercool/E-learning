<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("Location: login_prof.php");
}

$idp = $_SESSION['idp'];
?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Dashboard</title>
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
     <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
         <div class="container"><img class="jello animated infinite" src="assets/img/icons/b5f818111fc1fb6da75363010dedd1a4.png" style="width: 50px;"><a class="navbar-brand logo" href="#" style="color: #0072c6;font-family: Baloo, cursive;margin-right: 0px;margin-left: 0px;margin-bottom: -10px;">Washma</a>
             <button
                 data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                 <div class="collapse navbar-collapse" id="navcol-1">
                     <ul class="nav navbar-nav ml-auto">
                         <?php

						 ?>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="messageEtudiant.php" style="color: #0072c6;">Les etudiants</a></li>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="events/manager.php" style="color: #0072c6;">Ajouter un evenement</a></li>

                         <?php
                         echo "<li class='nav-item' role='presentation'><a class='nav-link' href='show_completed_cours.php' style='color: #0072c6;'>Completed Courses</a></li>";
                          ?>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #d81e05;"></a><a class="btn btn-danger text-center" role="button" href="logout.php" style="margin-top: -20px;margin-right: -10px;width: 90px;font-size: 15px;color: rgb(255,255,255);background-color: #d12d33;">Logout</a></li>
                     </ul>
                 </div>
         </div>
     </nav>
     <main class="page landing-page">
        <section class="clean-block features" style="font-size: 18px;"></section>
<div class="row justify-content-md-center">
<div class="col-lg-10">
<h1 class="text-warning text-center" > Cours à corriger </h1>
<table class=" table table-striped table-hover table-bordered">
<tr class="bg-dark text-white text-center">
<th>Student ID</th>
<th>Full name</th>
<th>Level</th>
<th> Show </th>
</tr>
<?php
include_once('config.php');
try {
            $dsn = "mysql:host=$host;dbname=$db";
            $conn = new PDO($dsn,$username,$password);
          } catch (Exception $error) {
            die('can not connect to database reason :'.$error->getMessage());
          }
$query = $conn->query("SELECT * FROM professor WHERE idp LIKE '$idp'");
$abc = $query->fetch();
$a = $abc['A'];
$b = $abc['B'];
$c = $abc['C'];
if ($a != NULL && $b != NULL && $c != NULL)
{
$query = $conn->query("SELECT DISTINCT id FROM completed_cours WHERE cours_level != ''");
}elseif ($a != NULL && $b == NULL && $c == NULL)
{
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "A%"');
}elseif ($a == NULL && $b != NULL && $c == NULL) {
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "B%"');
}elseif ($a == NULL && $b == NULL && $c != NULL) {
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "C%"');
}elseif ($a != NULL && $b != NULL && $c == NULL) {
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "A%" OR cours_level LIKE "B%"');
}elseif ($a != NULL && $b == NULL && $c != NULL) {
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "A%" OR cours_level LIKE "C%"');
}elseif ($a == NULL && $b != NULL && $c != NULL) {
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "B%" OR cours_level LIKE "C%"');
}elseif ($a == NULL && $b == NULL && $c != NULL) {
$query = $conn->query('SELECT DISTINCT id FROM completed_cours WHERE cours_level LIKE "C%"');
}
while ($result = $query->fetch())
{
$id = $result['id'];
$etudiant = $conn->query("SELECT * FROM etudiant WHERE id LIKE '$id'");
while($row = $etudiant->fetch()){
    echo '<form action="completed_cours.php" method="GET">';
    echo "<tr class=text-center>";
    echo '<td><input type="text" name="id" value="'.$row['id'].'" readonly style="width:35px;border: none;border-color: transparent;"></td>';
    echo "<td>".$row['firstname']." ".$row['lastname']."</td>";
    echo "<td>".$row['exact_level']."</td>";
      echo"<td><input type='submit' name='submit' value='Show' class='btn-danger btn'></td>";
  echo "</form>";

	echo"</tr>";
}
}
?>
</table>
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
