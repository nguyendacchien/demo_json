<?php
include "Data.php";
include "User.php";

//$user = new User('chien','321');
//Data::addUser($user);
?>

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
        <!--    <div class="imgcontainer">-->
        <!--        <img src="img_avatar2.png" alt="Avatar" class="avatar">-->
        <!--    </div>-->

        <div class="container">
            <label for="name"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="name" >
            <br>
            <br>

            <label for="pass"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" >
            <br>

            <button type="submit" style="background-color: green" name="login">Login</button>
            <button type="submit" style="background-color: green" name="singup">singup</button>
<!--            <label>-->
<!--                <input type="checkbox" checked="checked" name="remember"> Remember me-->
<!--            </label>-->
        </div>

<!--        <div class="container" style="background-color:#f1f1f1">-->
<!--            <button type="button" class="cancelbtn">Cancel</button>-->
<!--            <span class="psw">Forgot <a href="#">password?</a></span>-->
<!--        </div>-->
    </form>

    </body>
    </html>
<?php
if (isset($_POST['login'])) {
    $nam = $_REQUEST['name'];
    $pass = $_REQUEST['pass'];
    if (empty($nam)||empty($pass)){
        echo '<b>incomplete information</b>';
    }else{
        Data::login($nam, $pass);
    }
}else if (isset($_POST['singup'])){
    header('location: singup.php');
}
