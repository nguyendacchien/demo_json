<?php


class Customer
{
    public $sort;
    public $name;
    public $age;


    public function __construct($sort, $name, $age)
    {
        $this->sort = $sort;
        $this->name = $name;
        $this->age = $age;
    }


    public function getSort()
    {
        return $this->sort;
    }


    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getAge()
    {
        return $this->age;
    }


    public function setAge($age): void
    {
        $this->age = $age;
    }


}