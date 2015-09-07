<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:37
 */

namespace Human;

class Adult extends Human
{
    private $weight = 1;

    public function __construct($name, $role)
    {
        parent::__construct($name, $role);
    }

    public function getWeight()
    {
        return $this->weight;
    }
} 