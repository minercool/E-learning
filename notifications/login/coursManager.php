<?php
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$idc = $_GET['idc'];
$action = $_POST['submit'];
if ($action == "update")
{
    header("Location: updateCours.php?idc=$idc");
}else {
  $conn->query("DELETE FROM cours WHERE idc LIKE '$idc'");
  header("Location: list_courses.php");
}
?>
