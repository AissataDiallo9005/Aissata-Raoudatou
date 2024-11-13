<?php
session_start();
session_destroy();
header('Location: authent.php');
exit();
?>
