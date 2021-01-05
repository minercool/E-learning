<?php
require_once('config.php');

try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$id = $_POST['id'];
$idc = $_POST['idc'];
$note = $_POST['note'];
$time = date("Y-m-d h:i:sa");
$query = $conn->query("INSERT INTO note VALUES('$idc','$id','$note','$time')");
if ($query)
{
  $conn->query("DELETE FROM completed_cours WHERE id LIKE '$id' AND idc LIKE '$idc'");
  header("Location: completed_cours.php?id=$id");
}else {
  echo "error";
}


?>
