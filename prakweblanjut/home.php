<?php 
session_start();
if (isset($_SESSION['access_token'])){
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href='style.css' rel='stylesheet' type='text/css' >
</head>
<body>
    <div class="box">
    <input type="email" name="email" value="email"/>
    <input type="password" name="email" value="email"/>
    <a href="#"><div class="btn">Sign In</div></a>
    <a href="prakPertama.php"><div id="btn2">Login with google</div></a>
    </div>
</body>
</html>