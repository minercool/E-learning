<?php
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM note WHERE id LIKE '$id'");
$stmt->execute();
$num = $stmt->rowCount();
$note = $conn->query("SELECT * FROM note WHERE id LIKE '$id' ORDER BY time DESC");

?>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter"><?php echo $num ?></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                Your rates
                </h6>

                  <?php
                  $i = 0;
                  while ($resultat = $note->fetch() and $i < 10)
                  {
                    $i++;
                    $idc = $resultat['idc'];
                    $c = $conn->query("SELECT * FROM cours WHERE idc LIKE '$idc'");
                    $cours = $c->fetch();
                   ?>
                   <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500"><?php echo $cours['title'] ?>
                      <div class="small float-right"><b>Your rate</b></div>
                    </div>
                   <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $resultat['note'] ?>%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"><?php echo $resultat['note'] ?></div>
                    </div>
                    <div class="small text-gray-500"><b><?php echo $resultat['time'] ?></b></div>
                  </div>
                    </a>
                  <?php
                }
                   ?>

                <a class="dropdown-item text-center small text-gray-500" href="show/showAllTasks.php">View All Taks</a>
              </div>
            </li>
