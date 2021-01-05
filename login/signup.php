
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Form</title>
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

				<form class="login100-form validate-form" method="POST" action="">
          <?php
					session_start();
          require_once('config.php');
					require_once('security.php');
          try {
            $dsn = "mysql:host=$host;dbname=$db";
            $conn = new PDO($dsn,$username,$password);
          } catch (Exception $error) {
            die('can not connect to database'.$error->getMessage());
          }
          if (isset($_POST['email']) && isset($_POST['user']))
          {
            $firstname = $_REQUEST['firstname'];
            $lastname = $_REQUEST['lastname'];
            $email = $_REQUEST['email'];
            $user = $_REQUEST['user'];
            $password = $_REQUEST['password'];
            $birthday = $_POST['bdate'];
            $sexe = $_POST['menu'];
			$code = $code = rand(100000,1000000);
            $query = $conn->query("SELECT * FROM etudiant WHERE username LIKE '$user' OR email LIKE '$email'");
            if ($query->fetch() == 0)
            {
            $query = $conn->prepare("INSERT INTO etudiant VALUES('','$firstname','$lastname','$email','$user','".hash('sha256', $password)."','$birthday','$sexe','A1.1','$code','')");
						$query->execute();
						if ($query)
            {
							$_SESSION['confirmation'] = true;
							$_SESSION['user'] = $user;
							$to = $email;

    					$subject = "Blood donation";

    					$message = '

    					<html>

    					<body>

    					<h1>Hello <font color="red">'.$firstname .' '.$lastname.'</font></h1>

    					<p><h3>Thank you for signing up in Washma, your confirmation code is <font color="red"> '.$code.' </font><br> Please confirm your email so we can proceed</body></html>';

    					$headers = "From:Washma <washma@contact.us>\r\n";

    					$headers .= "Reply-To: washma@contact.us\r\n";

    					$headers .= "Content-type: text/html\r\n";

    					mail($to,$subject,$message,$headers);

              ?>
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Congrats !</h4>
                <?php echo "<p>Your account was created we will redirect you to the code confirmation page.</p>"; ?>
              </div>
              <?php
              header("Refresh:3; url=mail/confirmation.php");
            }else {
              ?>
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Ops !</h4>
                  <?php echo "Something went wrong."; ?>
              </div>
              <?php
            }
          }else {
            ?>
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Ops !</h4>
                <?php echo "Make sure your not using this email <span style=color:blue>".$email."</span> in another washma account if not try using another username instead of this username <span style=color:blue> ".$user."</span>."; ?>
            </div>
            <?php
          }
          }
          ?>
          <span class="login100-form-title">
						Member Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid first name is required">
						<input class="input100" type="text" name="firstname" placeholder="First Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid last name is required">
						<input class="input100" type="text" name="lastname" placeholder="Last Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>

					<!-- Date Picker Input -->
					<div class="wrap-input100">
						<input class="input100" type = "text" onfocus = "(this.type = 'date')"  id = "date" name="bdate" placeholder="Choose a Birthday" data-validate = "Valid birthday is require" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div><!-- DEnd ate Picker Input -->

					<div class="wrap-input100 validate-input">
						<select style="border:0" class="input100" type="gender" name="menu" placeholder="Gender" required>
							<option hidden>Choose gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
					    </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-transgender" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
          <div class="wrap-input100 validate-input" data-validate = "Valid username is required: john2020">
						<input class="input100" type="text" name="user" placeholder="Username">
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
						<input type="submit" value="CREATE YOUR ACCOUNT" class="login100-form-btn">
					</div>

					<div class="text-center p-t-20">
						<a class="txt2" href="login_etudiant.php">
							Login
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
