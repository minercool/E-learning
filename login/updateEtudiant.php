<?php
session_start();
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$birthday = $_POST['bday'];
$sexe = $_POST['sexe'];
$role = $_POST['role'];
$menu = $_POST['menu'];
$query = $conn->query("UPDATE etudiant SET id='$id', firstname='$firstname', lastname='$lastname', email='$email',birthday='$birthday',sexe='$sexe',exact_level ='$menu' WHERE id LIKE '$id'");
if ($query)
{
  header("Location: etudiants.php");
}else {
  echo "error";
}
?>
