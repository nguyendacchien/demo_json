<?php


class Lists
{
    public static string $path = 'list.json';

    public static function loadLists()
    {
        $listsJson = file_get_contents(self::$path);
        $lists = json_decode($listsJson);
        return self::convertLists($lists);
    }

    public static function saveLists($lists)
    {
        $listsJson = json_encode($lists);
        file_put_contents(self::$path, $listsJson);
    }

    public static function convertLists($lists)
    {
        $costomers = [];
        foreach ($lists as $list) {
            $costomer = new Customer($list->sort, $list->name, $list->age);
            array_push($costomers, $costomer);
        }
        return $costomers;
    }

    public static function addCustomer($costomer)
    {
        $costomers = self::loadLists();
        array_push($costomers, $costomer);
        Lists::saveLists($costomers);
    }

    public static function deleteCustomer($index)
    {
        $costomers = self::loadLists();
        array_splice($costomers, $index, 1);
        Lists::saveLists($costomers);
    }

}