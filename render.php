<?php
require __DIR__ . "/generate_form.php";
?>
<!DOCTYPE html>
<html>

<body>
   <h3>Word: <?php echo $_GET["rootword"]; ?></h3>
   <?php echo prepareRootWordTable($_GET["rootword"]); ?>

</body>

</html>