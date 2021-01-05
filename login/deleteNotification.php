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

$idn = $_POST['idn'];
$query = $conn->query("DELETE FROM notifications WHERE idn LIKE '$idn'");
if ($query)
{
  header("Location: notifications.php");
}else {
  echo "error";
}

?>
