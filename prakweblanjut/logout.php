<?php
require_once "prakPertama.php";
unset($_SESSION['access_token']);
session_destroy();
header('Location: home.php');
exit();
?>