
<?php  
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'cms');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
  echo "<div class='mt-3 alert alert-danger' role='alert'>Cannot connect to database!</div>";
}

$cms_url = "http://localhost/cms";

?>

