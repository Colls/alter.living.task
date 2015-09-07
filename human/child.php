<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:40
 */

namespace Human;

class Child extends Human
{
    private $weight = 0.5;

    public function __construct($name, $role)
    {
        parent::__construct($name, $role);
    }

    public function getWeight()
    {
        return $this->weight;
    }
}