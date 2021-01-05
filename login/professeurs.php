<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("Location: login_admin.php");
}
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
                         <li class="nav-item" role="presentation"><a class="nav-link active" style="color: #0072c6;" href="#">Home</a></li>
                         <?php

						 echo "<li class='nav-item' role='presentation'><a class='nav-link' href='list_courses.php' style='color: #0072c6;'>Courses</a></li>";
						 ?>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="etudiants.php" style="color: #0072c6;">Etudiants</a></li>
                         <?php
                         echo "<li class='nav-item' role='presentation'><a class='nav-link' href='professeurs.php' style='color: #0072c6;'>Professeurs</a></li>";
                         echo "<li class='nav-item' role='presentation'><a class='nav-link' href='notifications.php' style='color: #0072c6;'>Add notifications</a></li>";
                         echo "<li class='nav-item' role='presentation'><a class='nav-link' href='../level/add.php' style='color: #0072c6;'>Add question</a></li>";


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
<h1 class="text-warning text-center" > Les professeurss </h1>
<table class=" table table-striped table-hover table-bordered">
<tr class="bg-dark text-white text-center">
<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Username</th>
<th>Password</th>
<th>Level professeur</th>
<th>Delete</th>
<th>Update</th>

</tr>
<?php
include_once('config.php');
try {
            $dsn = "mysql:host=$host;dbname=$db";
            $conn = new PDO($dsn,$username,$password);
          } catch (Exception $error) {
            die('can not connect to database reason :'.$error->getMessage());
          }

$query = $conn->query("SELECT * FROM professor");

while($row = $query->fetch()){
    echo '<form action="professeurManager.php" method="POST">';
    echo "<tr class=text-center>";
    echo '<td><input type="text" name="idp" value="'.$row['idp'].'" readonly style="width:35px;border: none;border-color: transparent;"></td>';
    echo "<td>".$row['firstname']." ".$row['lastname']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "<td>".$row['A'].' '.$row['B'].' '.$row['C']."</td>";
      echo"<td><input type='submit' name='submit' value='Delete' class='btn-danger btn'></td>";
      echo '<td><input type="submit" name="submit" value="Update" class="btn-primary btn"></td>';
  echo "</form>";

	echo"</tr>";

}
?>
</table>
<div class="float-right"><form action="addProfesseur.php"><button type="submit" class="btn btn-outline-warning">Add professeur</button></form></div>

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
