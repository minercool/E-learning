<?php

require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}

$stmt = $conn->prepare("SELECT * FROM notifications");
$stmt->execute();
$num = $stmt->rowCount();
$query = $conn->query("SELECT * FROM notifications ORDER BY idn DESC");
?>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter"><?php echo $num ?></span>
              </a>

              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <?php
                $i = 0;
                while ($resultat = $query->fetch() and $i < 10)
                {
                $idn = $resultat['idn'];
                $i++;
                echo"<a class='dropdown-item d-flex align-items-center' href='show/showNotification.php?idn=$idn'>";
                  ?>
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $resultat['title'] ?></div>
                    <span class="font-weight-bold">
                    <?php
                    $content = $resultat['content'] ;
                    if (strlen($content) > 50)
                    {
                      echo substr($content,0,50)."...";
                    }else {
                      echo $content;
                    }
                    ?>
                    <div class="small text-gray-500"><?php echo $resultat['time'] ?></div>
                  </span>
                  </div>
                </a>
                <?php
                }
                 ?>


                <a class="dropdown-item text-center small text-gray-500" href="show/showAllNotification.php">Show All Notifications</a>
              </div>
            </li>
