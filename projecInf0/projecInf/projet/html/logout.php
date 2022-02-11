<?php
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "vous etes deconecter";
header("location:admin_log.php");
?> 