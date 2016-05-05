<?php
session_start();
unset($_SESSION['idu']);
unset($_SESSION['nama']);
unset($_SESSION['level']);
unset($_SESSION['ortu']);
unset($_SESSION['idk']);
session_destroy();

header('location:index.php');
?>