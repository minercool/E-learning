<?php
require_once('config.php');

try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$recordingUrl = 'https://api.nexmo.com/v1/files/'.NEXMO_RECORDING_ID;
$data = $conn->get($recordingUrl);
file_put_contents($recordingId.'.mp3', $data->getBody());
?>
