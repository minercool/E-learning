<?php
session_start();
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}

$action = $_POST['submit'];
$idp = $_POST['idp'];

if ($action == "Update")
{
  header("Location: showProfesseur.php?idp=$idp");

}else {
  $conn->query("DELETE FROM professor WHERE idp LIKE '$idp'");
  header("Location: professeurs.php");
}




?>
