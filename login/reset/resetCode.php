<?php
session_start();
require_once('../config.php');

try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
?>


<!DOCTYPE html>

<html lang="en">



<head>

    <!-- Required meta tags-->

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Colorlib Templates">

    <meta name="author" content="Colorlib">

    <meta name="keywords" content="Colorlib Templates">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




    <!-- Title Page-->

    <title>EMAIL confimation</title>



    <!-- Icons font CSS-->

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Font special for pages-->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">



    <!-- Vendor CSS-->

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">



    <!-- Main CSS-->

    <link href="css/main.css" rel="stylesheet" media="all">

    <!--<script>

        setTimeout(function() {

    var button =  document.getElementById('test');

    button.style.display = "";}

    , 15000);

  </script>-->

</head>



<body>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">

        <div class="wrapper wrapper--w790">

            <div class="card card-5">

                <div class="card-heading">

                    <h2 class="title">CONFIMATION </h2>

                </div>
                <?php
                if (isset($_POST['submit']))
                {
                  $email = $_SESSION['email'];
                  $code = $_POST['code'];
                  $query = $conn->query("SELECT * FROM etudiant WHERE (email LIKE '$email' AND code LIKE '$code')");
                  if ($query->fetch() != 0)
                   {
                     $_SESSION['reset'] = true;
                     header("Location: resetPassword.php");
                   }else {
                     echo '<div class="alert alert-danger" role="alert"><center>Code is wrong!</center></div>';
                   }
                }

                ?>


                <div class="card-body">

                    <form method="POST" action="">

                        <div class="form-row">

                            <div class="name">confirmation code</div>

                            <div class="value">

                                <div class="input-group">

                                    <input autocomplete="off" class="input--style-5" type="number" name="code" required />

                                </div>

                            </div>

                        </div>



                        <div>

                            <center><button class="btn btn--radius-2 btn--red" type="submit" name="submit">CONFIRM</button></center><br><br>

                        </div>

                    </form>

                    <form method="POST" action="">

                        <div>

                            <center><button class="btn btn--radius-2 btn--red" id="test" style="display:none" type="submit">RESEND CONFIRATION</button></center>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>





    <!-- Jquery JS-->

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Vendor JS-->

    <script src="vendor/select2/select2.min.js"></script>

    <script src="vendor/datepicker/moment.min.js"></script>

    <script src="vendor/datepicker/daterangepicker.js"></script>



    <!-- Main JS-->

    <script src="js/global.js"></script>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->



</html>

<!-- end document-->
