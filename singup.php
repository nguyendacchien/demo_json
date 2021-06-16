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
    <input type="text" name="name" placeholder="userName"><br>
    <input type="password" name="pass" placeholder="password"><br>
    <button name="singup">Signup</button>
</form>

</body>
</html>
<?php
include "Data.php";
include "User.php";


if (isset($_POST['singup'])){
    $name=$_REQUEST['name'];
    $pass = $_REQUEST['pass'];

    if (empty($name)||empty($pass)){
        echo '<b>incomplete information</b>';
    }else{
        $user = new User($name,$pass);
        Data::addUser($user);
        header('location: index.php');
    }

}