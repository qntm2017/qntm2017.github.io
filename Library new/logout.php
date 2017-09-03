<?php
session_start();
//unset session variable
unset($_SESSION['user_log']);
//end session
session_destroy();
header("location:index.php");
?>