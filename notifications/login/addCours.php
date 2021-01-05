  <?php
    include("config.php");
    try {
      $dsn = "mysql:host=$host;dbname=$db";
      $conn = new PDO($dsn,$username,$password);
    } catch (Exception $error) {
      die('can not connect to database reason :'.$error->getMessage());
    }


    if(isset($_POST['upload'])){
       $q1 = $_POST['q1'];
       $q2 = $_POST['q2'];
       $q3 = $_POST['q3'];
       $cours_level = $_POST['cours_level'];

       $maxsize = 100242880; // 100MB

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
              $query = $conn->query("INSERT INTO cours VALUES('','$title','$target_file_image','$target_file_video','$q1','$q2','$q3','$cours_level')");
              if($query)
              {
              echo "Upload successfully.";
			  header("Location: list_courses.php");
            }else
            {
              echo "error";
            }
            }
          }

       }else{
          echo "Invalid file extension.";
       }

     }
     ?>
<!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>ADD COURSE</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
     <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arizonia">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Han+Sans">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
     <link rel="stylesheet" href="assets/css/smoothproducts.css">
 </head>

 <body>
	<main class="page landing-page">
		<section class="clean-block features" style="font-size: 18px;"></section>
		<div class="row justify-content-md-center">
		  <div class="col-lg-8">
				<h1 class="text-warning text-center" >ADD COURSE</h1><br><br>

			<div class="card text-right">
			  <div class="card-body">

			<form method="POST"  enctype='multipart/form-data'>

			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Titre: </label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputEmail3" name="title" >
			</div>
			</div>

			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Image: </label>
			<div class="col-sm-6">
				<input type="file" class="form-control-file" name="image" >
			</div>
			</div>

			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Video: </label>
			<div class="col-sm-6">
				<input type="file" class="form-control-file" name="vid" >
			</div>
			</div>
      <div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Question 1: </label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputEmail3" name="q1" >
			</div>
			</div>
      <div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Question 2: </label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputEmail3" name="q2" >
			</div>
			</div>
      <div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Question 3: </label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputEmail3" name="q3" >
			</div>
			</div>

      <div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Course level: </label>
			<div class="col-sm-6">
				<select name="cours_level" class="form-control" id="inputEmail3">
          <option value="A1.1">A1.1</option>
          <option value="A1.2">A1.2</option>
          <option value="A2.1">A2.1</option>
          <option value="A2.2">A2.2</option>
          <option value="B1.1">B1.1</option>
          <option value="B1.2">B1.2</option>
          <option value="B2.1">B2.1</option>
          <option value="B2.2">B2.2</option>
          <option value="C1.1">C1.1</option>
          <option value="C1.2">C1.2</option>
          <option value="C2.1">C2.1</option>
          <option value="C2.2">C2.2</option>
        </select>
			</div>
			</div>

			<input type="submit" name="upload" value="Save" class="btn btn-outline-warning">


			</form>
			<!--<a class="btn btn-primary" href="dashboard.php" role="button">return</a>-->
			  </div>
			</div>
		  </div>
		</div>
	</main>
		 <script src="assets/js/jquery.min.js"></script>
		 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
		 <script src="assets/js/smoothproducts.min.js"></script>
		 <script src="assets/js/theme.js"></script>
 </body>
 </html>
