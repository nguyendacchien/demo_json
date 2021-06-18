<?php


class Data
{
    public static string $path = 'data.json';

    public static function loadData()
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::convertUser($data);

    }

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function convertUser($data)
    {
        $users = [];
        foreach ($data as $sum) {
            $user = new User($sum->name, $sum->pass);
            array_push($users, $user);
        }
        return $users;

    }

    public static function addUser($user)
    {
        $users = self::loadData();
        array_push($users, $user);
        self::saveData($users);
    }

    public static function checkLog($user)
    {
        $users = self::loadData();
        foreach ($users as $item) {
            if ($user->name == $item->name && $user->pass == $item->pass) {
                return true;
            }
        }
        return false;

    }

    public static function login($name, $pass)
    {
        $user = new User($name, $pass);
        if (self::checkLog($user)) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $pass;
            header('location:home.php');
        } else {
            echo "Invalid userName";
        }
    }

}