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
$_SESSION['confirmation'] = true;
$id = $_SESSION['id'];
$query = $conn->query("SELECT * FROM etudiant WHERE id LIKE '$id'");
$resultat = $query->fetch();
$email = $resultat['email'];
$firstname = $resultat['firstname'];
$lastname = $resultat['lastname'];
$code = $code = rand(100000,1000000);
$conn->query("UPDATE etudiant SET code = '$code' WHERE id LIKE '$id'");

$to = $email;

$subject = "Email confirmation";

$message = '

<html>

<body>

<h1>Hello <font color="red">'.$firstname .' '.$lastname.'</font></h1>

<p><h3>Thank you for signing up in Washma, your confirmation code is <font color="red"> '.$code.' </font><br> Please confirm your email so we can proceed</body></html>';

$headers = "From:Washma <washma@contact.us>\r\n";

$headers .= "Reply-To: washma@contact.us\r\n";

$headers .= "Content-type: text/html\r\n";

mail($to,$subject,$message,$headers);

header("Location: confirmation.php");

?>
