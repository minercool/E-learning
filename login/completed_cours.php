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
<th>Course ID</th>
<th>Course level</th>
<th>Question 1</th>
<th>Question 2</th>
<th>Answer 1</th>
<th>Answer 2</th>
<th> Send Result </th>
</tr>
<?php
include_once('config.php');
try {
            $dsn = "mysql:host=$host;dbname=$db";
            $conn = new PDO($dsn,$username,$password);
          } catch (Exception $error) {
            die('can not connect to database reason :'.$error->getMessage());
          }

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM completed_cours WHERE id LIKE '$id'");
while($row = $query->fetch()){
    echo '<form action="sendResult.php" enctype="multipart/form-data" method="POST">';
    echo "<tr class=text-center>";
    echo '<td><input type="text" name="id" value="'.$row['id'].'" readonly style="width:35px;border: none;border-color: transparent;"></td>';
    echo '<td><input type="text" name="idc" value="'.$row['idc'].'" readonly style="width:35px;border: none;border-color: transparent;"></td>';
    echo "<td>".$row['cours_level']."</td>";
    echo "<td>".$row['question_1']."</td>";
    echo "<td>".$row['question_2']."</td>";
    ?>
    <td>
    <audio controls>
    <source src="<?php echo $row['response_1'] ?>" type="audio/mpeg">
    </source>
    </audio>
    </td>
    <?php
    echo "<td>".$row['response_2']."</td>";
    echo"<td><input type='text' name='note' style='width:50px;'>/100<input type='submit' name='submit' value='Send result' class='btn-danger btn'></td>";
  echo "</form>";

	echo"</tr>";
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
