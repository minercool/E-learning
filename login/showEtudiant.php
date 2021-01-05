<?php
session_start();
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$id = $_GET['id'];

$query = $conn->query("SELECT * FROM etudiant WHERE id LIKE '$id'");
?>
<!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Update Student</title>
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
<div class="row justify-content-md-center">
<div class="col-md-auto">
<h1 class="text-warning text-center" > Les etudiants </h1>
<table class=" table table-striped table-hover table-bordered">
<tr class="bg-dark text-white text-center">
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Birthday</th>
<th>Sex</th>
<th>Level </th>
<th> Action </th>
</tr>

<?php
while ($resultat = $query->fetch())
{
  echo'<form action="updateEtudiant.php" method="POST">';
  echo'<td><input class="form-control" type="text" name="id" value="'.$resultat['id'].'" readonly><br></td>';
  echo'<td><input class="form-control"type="text" name="firstname" value="'.$resultat['firstname'].'"><br></td>';
  echo'<td><input class="form-control"type="text" name="lastname" value="'.$resultat['lastname'].'"><br></td>';
  echo'<td><input class="form-control"type="text" name="email" value="'.$resultat['email'].'"><br></td>';
  echo '<td><input class="form-control"type="date" name="bday" value="'.$resultat['birthday'].'"><br></td>';
  echo '<td><select class="form-control" name="sexe"><option value="male">male</option><option value="female">female</option></select><br></td>';

	echo '<td><select name="menu" class="form-control">
          <option value="A1.1">A1.1</option>
          <option value="A1.2">A1.2</option>
          <option value="A2.1">A2.1</option>
          <option value="A2.2">A2.2</option>
          <option value="B1.1">B1.1</option>
          <option value="B1.2">B1.2</option>
          <option value="B2.1">B2.1</option>
          <option value="B2.2">B2.2</option>
          <option value="C1.1">C1.1</option>
          <option value="C1.2">C1.2</option>
          <option value="C2.1">C2.1</option>
          <option value="C2.2">C2.2</option>
         </select></td>';

  echo '<td><input type="submit" class="btn btn-primary" value="update"></td>';
  echo '</form>';
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
