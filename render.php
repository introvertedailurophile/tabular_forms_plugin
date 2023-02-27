<?php
// enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/generate_form.php";
?>
<!DOCTYPE html>
<html>

<body>
   <h3>Word: <?php echo $_GET["rootword"]; ?></h3>
   <?php echo prepareRootWordTable($_GET["rootword"]); ?>

</body>

</html>