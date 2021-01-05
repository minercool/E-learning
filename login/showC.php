<?php
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$idc = $_GET['idc'];
$query = $conn->query("SELECT * FROM cours WHERE idc LIKE '$idc'");
$resultat = $query->fetch();
?>
<form action="" method="POST">
Course name : <input type="text" name='title' value="<?php echo $resultat['title'] ?>"><br>
New video : <input type="file" name="vid"><br>
New image : <input type="file" name="image"><br>
<input type="submit" name="update" value="update">
</form>

<?php


if(isset($_POST['update'])){
   $maxsize = 100242880; // 100MB
   $title = $_POST['title'];
   $name = $_FILES['vid']['name'];
   $target_dir = "data/videos/";
   $target_file_video = $target_dir . $_FILES["vid"]["name"];

   $name = $_FILES['image']['name'];
   $target_dir = "data/image/";
   $target_file_image = $target_dir . $_FILES["image"]["name"];

   // Select file type
   $videoFileType = strtolower(pathinfo($target_file_video,PATHINFO_EXTENSION));
   $imageFileType = strtolower(pathinfo($target_file_image,PATHINFO_EXTENSION));
   // Valid file extensions
   $extensions_arr = array("mp4","avi","3gp","mov","mpeg","jpg","jpeg","png","gif");

   // Check extension
   if( in_array($videoFileType,$extensions_arr) && in_array($imageFileType,$extensions_arr) ){

      // Check file size
      if(($_FILES['vid']['size'] >= $maxsize) || ($_FILES["vid"]["size"] == 0)) {
        echo "File too large. File must be less than 100MB.";
      }else{
        // Upload
        if(move_uploaded_file($_FILES['vid']['tmp_name'],$target_file_video) && move_uploaded_file($_FILES['image']['tmp_name'],$target_file_image) ){
          // Insert record
          $title = $_POST['title'];
          $query = $conn->query("UPDATE cours SET title='$title', image='$target_file_image', video='$target_file_video' WHERE id LIKE $idc");
          if($query)
          {
          echo "Upload successfully.";
          }
        }else
        {
          echo "error";
        }
        }
      

   }else
   {
     echo "Invalid file extension.";
   }
  }
?>
