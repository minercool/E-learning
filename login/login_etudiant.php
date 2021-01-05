
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
          <?php
          session_start();
          require_once('config.php');
          try {
            $dsn = "mysql:host=$host;dbname=$db";
            $conn = new PDO($dsn,$username,$password);
          } catch (Exception $error) {
            die('can not connect to database reason :'.$error->getMessage());
          }

          if (isset($_POST['user']) && isset($_POST['password']))
          {
            $user = stripslashes($_REQUEST['user']);
            $password = stripslashes($_REQUEST['password']);
			$password = hash('sha256', $password);
            $query = $conn->prepare("SELECT * FROM etudiant WHERE username LIKE '$user' AND password LIKE '$password'");
						$query->execute();
            if ($query->fetch() != 0)
            {
              $_SESSION['loggedin'] = true;
              $query = $conn->query("SELECT * FROM etudiant WHERE username LIKE '$user' AND password LIKE '$password'");
              $resultat = $query->fetch();
							$_SESSION['role'] = "etudiant";
							$_SESSION['user'] = $resultat['username'];
							$_SESSION['id'] = $resultat['id'];
							$id = $_SESSION['id'];
              header("Location: dashboard.php?id=$id");
            }else {
              ?>
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Ops !</h4>
                  <?php echo "Wrong user or password"; ?>
              </div>
              <?php
            }

          }

          ?>
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: ex: john002">
						<input class="input100" type="text" name="user" placeholder="User">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="reset.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-20">
						<a class="txt2" href="signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
