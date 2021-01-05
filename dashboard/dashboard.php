<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("Location: login.php");
}
$user = $_GET['user'];
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
 </head>

 <body>
     <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
         <div class="container"><img class="jello animated infinite" src="assets/img/icons/b5f818111fc1fb6da75363010dedd1a4.png" style="width: 50px;"><a class="navbar-brand logo" href="#" style="color: #0072c6;font-family: Baloo, cursive;margin-right: 0px;margin-left: 0px;margin-bottom: -10px;">Washma</a>
             <button
                 data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                 <div class="collapse navbar-collapse" id="navcol-1">
                     <ul class="nav navbar-nav ml-auto">
                         <li class="nav-item" role="presentation"><a class="nav-link active" style="color: #0072c6;" href="index.html">Home</a></li>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="features.html" style="color: #0072c6;">PAGE 1</a></li>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="pricing.html" style="color: #0072c6;">page 2</a></li>
                         <li class="nav-item" role="presentation" style="margin-right: -12px;"><a class="nav-link" href="about-us.html" style="margin-top: -7px;color: #0072c6;"><img src="assets/img/icons/client.png" style="width: 35px;height: 35px;margin-top: 0px;"><?php echo $user ?></a></li>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.html" style="color: #d81e05;"></a><a class="btn btn-danger text-center" role="button" href="logout.php" style="margin-top: -20px;margin-right: -10px;width: 90px;font-size: 15px;color: rgb(255,255,255);background-color: #d12d33;">Logout</a></li>
                     </ul>
                 </div>
         </div>
     </nav>
     <main class="page landing-page">
         <section class="clean-block features" style="font-size: 18px;"></section>
         <section class="clean-block about-us">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-sm-6 col-lg-4">
                         <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/php.png" style="height: 195px;">
                             <div class="card-body info">
                                 <h4 class="card-title">php</h4>
                                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                 <div class="icons"><button class="btn btn-outline-primary btn-lg" type="button">Join Now</button></div>
                                 <div class="icons"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-lg-4">
                         <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/c.jpg">
                             <div class="card-body info">
                                 <h4 class="card-title">C#</h4>
                                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><button class="btn btn-outline-primary btn-lg" type="button">Join Now</button></div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-lg-4">
                         <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/python.jpg" style="height: 200px;">
                             <div class="card-body info">
                                 <h4 class="card-title">python</h4>
                                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                 <div class="icons"><button class="btn btn-outline-primary btn-lg" type="button" style="background-color: rgb (0,123,255);">Join Now</button></div>
                             </div>
                         </div>
                     </div>
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
