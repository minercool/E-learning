<?php
session_start();
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$idp = $_POST['idp'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$A = $_POST['A'];
$B = $_POST['B'];
$C = $_POST['C'];

$query = $conn->query("UPDATE professor SET idp='$idp', firstname='$firstname', lastname='$lastname', email='$email',username='$username',password='$password',A='$A',B='$B',C='$C' WHERE idp LIKE '$idp'");
if ($query)
{
  echo "works";
  header("Location: professeurs.php");
}else {
  echo "error";
}
?>
