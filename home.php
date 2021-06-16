<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <button name="logOut">LogOut</button>
</form>
</body>
</html><?php
session_start();
echo $_SESSION['name'] . $_SESSION['pass'];
if (isset($_REQUEST['logOut'])){
    header('location: index.php');
}
