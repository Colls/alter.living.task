<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:58
 */

namespace App;

use Human\Adult as Adult;

class PeopleGenerator
{
    private $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run()
    {
        $travellers = [];
        foreach ($this->config as $className => $humans) {
            if (class_exists("\\Human\\" . $className)) {
                foreach ($humans as $human) {
                    $class = "\\Human\\" . $className;
                    $travellers[] = new $class($human['name'], $human['role']);
                }
            } else {
                $travellers[] = new Adult("Неизвестный", "незнакомец");
            }
        }
        return $travellers;
    }
}