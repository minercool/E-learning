<?php
session_start();
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$idp = $_GET['idp'];

$query = $conn->query("SELECT * FROM professor WHERE idp LIKE '$idp'");

?>

<!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Update professor</title>
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
<h1 class="text-warning text-center" > Les professeurs </h1>
<table class=" table table-striped table-hover table-bordered">
<tr class="bg-dark text-white text-center">
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Username</th>
<th>Password</th>
<th colspan="3">Level professeur</th>
<th>Action</th>
</tr>

<?php
while ($resultat = $query->fetch())
{
  echo"<form action='updateProfesseur.php' method='POST'>";
  echo"<td><input class='form-control' type='text' name='idp' value='".$resultat['idp']."' readonly><br></td>";
  echo"<td><input class='form-control' type='text' name='firstname' value='".$resultat['firstname']."'><br></td>";
  echo"<td><input class='form-control' type='text' name='lastname' value='".$resultat['lastname']."'><br></td>";
  echo"<td><input class='form-control' type='text' name='email' value='".$resultat['email']."'><br></td>";
  echo"<td><input class='form-control' type='text' name='username' value='".$resultat['username']."'><br></td>";
  echo"<td><input class='form-control' type='text' name='password' value='".$resultat['password']."'><br></td>";
  echo"<td>A<input type='checkbox' value='A' class='form-control'  name='A' ></td>";
  echo"<td>B<input type='checkbox' value='B' class='form-control'  name='B' ></td>";
  echo"<td>C<input type='checkbox' value='C' class='form-control'  name='C' ></td>";
  echo"<td><input type='submit' class='btn btn-primary' value='update'></td>";
  echo"</form>";
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
