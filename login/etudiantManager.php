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
$id = $_POST['id'];

if ($action == "Update")
{
  header("Location: showEtudiant.php?id=$id");

}else {
  $conn->query("DELETE FROM etudiant WHERE id LIKE '$id'");
  header("Location: etudiants.php");
}




?>
