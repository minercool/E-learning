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

$name = $_FILES['audio_file']['name'];
$target_dir = "data/vocals/";
$target_file_vocal = $target_dir . $_FILES["audio_file"]["name"];
move_uploaded_file($_FILES['audio_file']['tmp_name'],$target_file_vocal);

$idc = $_GET['idc'];
$id = $_GET['id'];
$r2 = $_POST['r2'];
$check = $conn->query("SELECT * FROM completed_cours WHERE id LIKE '$id' AND idc LIKE '$idc'");
if ($check->fetch() == 0)
{
$query1 = $conn->query("SELECT * FROM etudiant WHERE id LIKE '$id'");
$query2 = $conn->query("SELECT * FROM cours WHERE idc LIKE '$idc'");
$etudiant = $query1->fetch();
$id = $etudiant['id'];
$role = "etudiant";
$user = $etudiant['username'];
$firstname = $etudiant['firstname'];
$lastname = $etudiant['lastname'];
$cours = $query2->fetch();
$q1 = $cours['question_1'];
$q2 = $cours['question_2'];

$cours_level = $cours['cours_level'];
$query = $conn->query("INSERT INTO completed_cours VALUES('$idc','$id','$firstname','$lastname','$q1','$q2','$target_file_vocal','$r2','$cours_level')");
if ($query)
{
  header("Location: dashboard.php?user=$user&id=$id&role=$role");
}else {
  echo "error";
}

}else {
  ?>
    <script>

    alert("You already completed this course in order to do it again wait untill one of our professors correct your answer then feel free to completed again, You will recieve your mark as soon as possible");
    window.location = "dashboard.php?id=" + <?php echo $id ?> + "";

    </script>
<?php
}
 ?>
