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

$id = $_SESSION['id'];
$role = $_SESSION['role'];
$user = $_SESSION['user'];
$query = $conn->query("SELECT * FROM etudiant WHERE id LIKE '$id'");
$resultat = $query->fetch();
if ($role == "etudiant")
{
$exact_level = $resultat['exact_level'];
if ($exact_level[0] == "A")
{
  $query1 = $conn->query("SELECT * FROM cours WHERE cours_level LIKE 'A%'");
}elseif ($exact_level[0] == "B") {
  $query1 = $conn->query("SELECT * FROM cours WHERE cours_level LIKE 'B%' OR cours_level LIKE 'A%'");
}elseif ($exact_level[0] == "C") {
  $query1 = $conn->query("SELECT * FROM cours WHERE cours_level LIKE 'C%' OR cours_level LIKE 'B%' OR cours_level LIKE 'A%'");
}



}else {
  $query1 = $conn->query("SELECT * FROM cours");
}

 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
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
	<link href="notifications/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="notifications/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
     <link href="notifications/css/ruang-admin.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script type="text/javascript">
     $(document).ready( function () {
       refresh1();
       refresh2();
       refresh3();


     });
       function refresh1() {
       setInterval(function() {
         $('#refresh-1').load('notifications/alert.php');
         refresh();
       }, 20000);
     };

     function refresh2() {
     setInterval(function() {
       $("#refresh-2").load("notifications/msg.php?id=<?php echo urlencode($id) ?>");
       refresh();
     }, 20000);
   };

   function refresh3() {
   setInterval(function() {
     $("#refresh-3").load("notifications/task.php?id=<?php echo urlencode($id) ?>");
     refresh();
   }, 20000);
 };
     </script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><img class="jello animated infinite" src="assets/img/icons/b5f818111fc1fb6da75363010dedd1a4.png" style="width: 50px;"><a class="navbar-brand logo" href="#" style="color: #0072c6;font-family: Baloo, cursive;margin-right: 0px;margin-left: 0px;margin-bottom: -10px;">Washma</a>
            <button
                data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" style="margin-top: 15px;color: #0072c6;" href="#">OUR COURSES</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="events/events.php" style="margin-top: 15px;color: #0072c6;">events</a></li>
                        <div id="refresh-1" style="margin-top:15px;">
                         <li class="nav-item" role="presentation"><?php include 'notifications/alert.php'; ?></li>
                       </div>
                       <div id="refresh-2" style="margin-top:15px;">
                         <li class="nav-item" role="presentation"><?php include 'notifications/msg.php'; ?></li>
                       </div>
                       <div id="refresh-3" style="margin-top:15px;">
                         <li class="nav-item" role="presentation"><?php include 'notifications/task.php'; ?></li>
                       </div>
						<li class="nav-item" role="presentation" style="margin-right: -12px;"><a class="nav-link" href="#" style="margin-top: 7px;color: #0072c6;"><img src="assets/img/icons/client.png" style="width: 35px;height: 35px;margin-top: 0px;"><?php echo $user ?></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.html" style="color: #d81e05;"></a>
							<?php
                          if ($role == "admin")
                          {
							echo "<li class='nav-item' role='presentation'><a class='nav-link' href='contact-us.html' style='color: #d81e05;'></a><a class='btn btn-warning text-center' role='button' href='etudiants.php?user=".$user."&id=".$id."' style='margin-top: -9px;margin-right: -10px;width: 90px;font-size: 15px;'>admin</a></li>";
						             }
                         if ($role == "prof")
                         {
                           $_SESSION['idp'] = $_SESSION['id'];
                           echo "<li class='nav-item' role='presentation'><a class='nav-link' href='contact-us.html' style='color: #d81e05;'></a><a class='btn btn-warning text-center' role='button' href='messageEtudiant.php?user=".$user."&id=".$id."&idp=".$_SESSION['idp']."' style='margin-top: -10px;margin-right: -10px;width: 90px;font-size: 15px;'>Professeur</a></li>";
                         }
                        ?>
							<a class="btn btn-danger text-center" role="button" href="logout.php" style="margin-top: auto;margin-bottom: 15px;margin-right: -120px;width: 90px;font-size: 15px;color: rgb(255,255,255);background-color: #d12d33;margin-left: 30px;">Logout</a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <main class="page landing-page">
    <section class="clean-block features" style="margin-top:-15px;font-size: 18px;">
           <?php
		   if ($_SESSION['role'] == 'etudiant')
		   {
           $id = $_SESSION['id'];
           $query = $conn->query("SELECT * FROM etudiant WHERE id LIKE '$id'");
           $confirmation = $query->fetch();
           if ($confirmation['confirmation'] === '' && $_SESSION['role'] == 'etudiant')
           {
             ?>
           <center><div class="alert alert-warning" role="alert" style="margin-top:20px;">
             Your email is not verified <a href="mail/reconfirmation.php" class="alert-link">verify now</a>.
             <?php
           }
		   }
             ?>
</div></center>
         </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="row justify-content-center">
                <?php
                  while ($cours = $query1->fetch())
                  {
                    echo "<div class='col-sm-6 col-lg-4'>";
                      echo "<div class='card clean-card text-center'><img class='card-img-top w-100 d-block' src='".$cours['image']."' style='height: 200px;'>";
                            echo"<div class='card-body info'>";
                                echo"<h4 class='card-title'>".$cours['title']."</h4>";
                                echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>";
                                echo "<form method='POST' action='showCours.php?idc=".$cours['idc']."&id=$id'>";
                                echo "<div class='icons'><input class='btn btn-outline-primary btn-lg' type='submit' value='Join cours' style='background-color: rgb (0,123,255);'></div>";
                                echo "</form>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                  }
                   ?>
                    
                </div>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>