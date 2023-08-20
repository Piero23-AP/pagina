<?php
session_start();
session_destroy();
header("Location: ../../../dashboardLogin/index.php");
exit;
?>
