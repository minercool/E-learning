<?php
require_once('config.php');
try {
  $dsn = "mysql:host=$host;dbname=$db";
  $conn = new PDO($dsn,$username,$password);
} catch (Exception $error) {
  die('can not connect to database reason :'.$error->getMessage());
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM messages WHERE id LIKE '$id'");
$stmt->execute();
$num = $stmt->rowCount();
$query = $conn->query("SELECT * FROM messages WHERE id LIKE '$id' ORDER BY time DESC");
?>


            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter"><?php echo $num ?></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <?php
                $i = 0;
                while ($resultat = $query->fetch() and $i < 10)
                {
                  $i++;
                  $idm = $resultat['idm'];
                echo "<a class='dropdown-item d-flex align-items-center' href='show/showMessage.php?idm=$idm'>";
                  ?>
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">
                    <?php
                    $message = $resultat['message'];
                    if (strlen($message) > 50)
                    {
                      echo substr($message,0,50)."...";
                    }else {
                      echo $message;
                    }
                    ?>
                    </div>
                    <div class="small text-gray-500">Sent at :<?php echo $resultat['time'] ?></div>
                    <div class="small text-gray-500">-------</div>
                  </div>
                </a>
                <?php
                }
                 ?>
                <a class="dropdown-item text-center small text-gray-500" href="show/showAllMessages.php">Read More Messages</a>
              </div>
            </li>
