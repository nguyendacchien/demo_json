<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    #delete {
        background-color: red;
        color: white;
    }

    #edit {
        background-color: green;
        color: black;
    }

    button {
        width: 100px;
    }

    th {
        width: 200px;
    }

    td {
        width: 200px;
    }
</style>
<body>
<form method="post">
    <button name="logOut">LogOut</button>
</form>
<form method="post">
    <input type="text" name="sort" placeholder="sort">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="age" placeholder="age">
    <button type="submit" name="add">Add</button>
</form>
<?php
include_once "Customer.php";
include "Lists.php";

if (isset($_REQUEST['add'])) {
    $sort = $_REQUEST['sort'];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    if (empty($sort) || empty($name) || empty($age)) {
        echo '<b>incomplete information</b>';
    } else {
        $customer = new Customer($sort, $name, $age);
        Lists::addCustomer($customer);
    }
}
?>

<?php
$path = Lists::$path;
$listsJson = file_get_contents($path);
$lists = json_decode($listsJson);
?>
<table border="1px">
    <h1>
        <caption><b>Danh sách khách hàng</b></caption>
    </h1>
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Tuổi</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    </thead>
    <tbody>
    <?php
    foreach ($lists as $key=>$customer):?>
        <form method="post">
        <tr>
        <td><?php echo $key+1?></td>
        <td><?php echo $customer->sort?></td>
        <td><?php echo $customer->name?></td>
        <td><?php echo $customer->age?></td>
        <td><button id='edit'>edit</button></td>
        <td><button name='delete' id='delete'>delete</button></td>
        </tr>
        </form>
    <?php endforeach;?>
    </tbody>
</table>

</body>
</html>
//<?php
    if (isset($_REQUEST['delete'])){
        $index = $_REQUEST['delete'];
        Lists::deleteCustomer($index);
    }


session_start();
if (!isset($_SESSION['name'])) {
    header('location: index.php');
}
if (isset($_REQUEST['logOut'])) {
    session_destroy();
    header('location: index.php');
}

