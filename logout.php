<?php
unset($_SESSION['SESS_MEMBER_ID']);
session_start();
session_destroy();
header('location:index.php')
?>