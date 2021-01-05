<?php
   header("Refresh: 60");
   require_once('bdd.php');
   session_start();
   if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
   {
     header("Location: ../login_etudiant.php");
   }
   $sql = "SELECT id, title, start, end, color FROM events ";
   
   $req = $bdd->prepare($sql);
   $req->execute();
   
   $events = $req->fetchAll();
   $id = $_SESSION['id'];
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Dashboard</title>
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
      <title>Bare - Start Bootstrap Template</title>
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- FullCalendar -->
      <link href='css/fullcalendar.css' rel='stylesheet' />
      <!-- Custom CSS -->
      <style>
         body {
         padding-top: 70px;
         /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
         }
         #calendar {
         max-width: 800px;
         }
         .col-centered{
         float: none;
         margin: 0 auto;
         }
      </style>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body style="margin-top:-65px;">
      <div id="div">
      <?php
         echo "<p align='right'><a href='../dashboard.php?id=$id' role='button' class='btn btn-warning btn-lg'>Return</a></p>";
         ?>
      <!-- Page Content -->
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1>Events calendar</h1>
               <div id="calendar" class="col-centered">
               </div>
            </div>
         </div>
         <!-- /.row -->
         <!-- Modal -->
         <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="addEvent.php">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="title" class="col-sm-2 control-label">Title</label>
                           <div class="col-sm-10">
                              <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="color" class="col-sm-2 control-label">Color</label>
                           <div class="col-sm-10">
                              <select name="color" class="form-control" id="color">
                                 <option value="">Choose</option>
                                 <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                 <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                 <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                 <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                 <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                 <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                 <option style="color:#000;" value="#000">&#9724; Black</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="start" class="col-sm-2 control-label">Start date</label>
                           <div class="col-sm-10">
                              <input type="text" name="start" class="form-control" id="start" readonly>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="end" class="col-sm-2 control-label">End date</label>
                           <div class="col-sm-10">
                              <input type="text" name="end" class="form-control" id="end" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                           <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                           <select name="color" class="form-control" id="color">
                              <option value="">Choose</option>
                              <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                              <option style="color:#008000;" value="#008000">&#9724; Green</option>
                              <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                              <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                              <option style="color:#000;" value="#000">&#9724; Black</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <div class="checkbox">
                              <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="id" class="form-control" id="id">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.container -->
      <!-- jQuery Version 1.11.1 -->
      <script src="js/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!-- FullCalendar -->
      <script src='js/moment.min.js'></script>
      <script src='js/fullcalendar.min.js'></script>
      <script>
         $(document).ready(function() {
         	
         	$('#calendar').fullCalendar({
         		header: {
         			left: 'prev,next today',
         			center: 'title',
         			right: 'month,basicWeek,basicDay'
         		},
         		defaultDate: '<?php echo date("Y/m/d") ?>',
         		editable: false,
         		eventLimit: false, // allow "more" link when too many events
         		selectable: false,
         		selectHelper: false,
         		events: [
         		<?php foreach($events as $event): 
            $start = explode(" ", $event['start']);
            $end = explode(" ", $event['end']);
            if($start[1] == '00:00:00'){
            	$start = $start[0];
            }else{
            	$start = $event['start'];
            }
            if($end[1] == '00:00:00'){
            	$end = $end[0];
            }else{
            	$end = $event['end'];
            }
            ?>
         			{
         				id: '<?php echo $event['id']; ?>',
         				title: '<?php echo $event['title']; ?>',
         				start: '<?php echo $start; ?>',
         				end: '<?php echo $end; ?>',
         				color: '<?php echo $event['color']; ?>',
         			},
         		<?php endforeach; ?>
         		]
         	});
         	
         	
         });
         
      </script>
   </body>
</html>
