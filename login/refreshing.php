<html>
<head>
  <!-- refresh every 5 seconds -->
  <meta http-equiv="refresh" content="5">
</head>
<body>
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
  $query = $conn->query("SELECT * FROM notifications");
  ?>
              <html>
              <head>
              </head>
              <body>
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
                  while ($resultat = $query->fetch())
                  {
                  ?>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500"><?php echo $resultat['title'] ?></div>
                      <span class="font-weight-bold"><?php echo $resultat['content'] ?></span>
                    </div>
                  </a>
                  <?php
                  }
                   ?>


                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                </div>
              </li>
            </body>
              </html>

</body>
</html>
