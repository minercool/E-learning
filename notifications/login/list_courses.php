<?php

require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$query = $conn->query("SELECT * FROM cours");

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
     <main class="page landing-page">
        <section class="clean-block features" style="font-size: 18px;"></section>

<div class="row justify-content-md-center">
<div class="col-lg-8">
<h1 class="text-warning text-center" > Current Courses </h1>
<table class=" table table-striped table-hover table-bordered">
<tr class="bg-dark text-white text-center">
<th>ID</th>
<th>Course Name</th>
<th colspan="3" >Actions</th>
</tr>
<?php
while ($resultat = $query->fetch())
{
  echo "<tr>";
  echo "<form action='login/coursManager.php?idc=".$resultat['idc']."' method='POST'>";
  echo "<td><input type='text' value='".$resultat['idc']."' readonly style='width:35px;border: none;border-color: transparent;'></td>";
  echo "<td><input type='text' value='".$resultat['title']."' readonly style='width:auto;border: none;border-color: transparent;'></td>";
  echo "<td><input type='submit' name='submit' class='btn btn-danger btn-lg' style='margin-left:25px;' value='delete'><input type='submit' name='submit' class='btn btn-warning btn-lg' style='margin-left:25px;' value='update'></td>";
  echo "</form>";
  echo "</tr>";
}
$_SESSION['loggedin'] = true;
?>
</table>
<div class="float-right"><form action="login/addCours.php"><button type="submit" class="btn btn-outline-warning">Add Cours</button></form></div>

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
