<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:35
 */
namespace Human;

abstract class Human
{
    protected $name;
    protected $role;

    public function __construct($name, $role)
    {
        $this->name = $name;
        $this->role = $role;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRole()
    {
        return $this->role;
    }

    abstract function getWeight();
}