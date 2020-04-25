<?php
session_start();
if (isset($_SESSION["id_petugas"])) {
    header("Location : http://localhost/thelast/indexx.php");
} 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>LOGINdata</title>
        <link rel="stylesheet" href="indexx1.css">
        </head>
    <body>
<form action="proses-login.php" method="post" class="box">
    <h1>Login</h1>
    <div class="textbox">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        </div>
    <input type="submit" name="btnlogin" value="login">
</form>

</body>
</html>