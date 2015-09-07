<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:59
 */

namespace App;

class App
{
    private $log;
    private $children = [];
    private $adults = [];
    private $cargoNum = 0;

    public function __construct($travellers)
    {
        foreach ($travellers as $traveller) {
            $this->addTraveller($traveller);
        }
        $this->log = new \App\Log();
    }

    private function addTraveller(\Human\Human $traveller)
    {
        switch ($traveller->getWeight()) {
            case 0.5:
                $this->children[] = $traveller;
                break;
            case 1:
                $this->adults[] = $traveller;
                break;
            default:
                throw new \Exception("Wrong weight is set");
        }
    }

    public function getLog()
    {
        return $this->log;
    }

    private function moveChildren()
    {
        $child1 = $this->children[0];
        while (count($this->children) > 2) {
            $child2 = array_pop($this->children);
            $this->formLog($child1, $child2, true);
            $this->formLog($child1, false);
            $this->cargoNum += 2;
        }
    }

    private function formLog()
    {
        $args = func_get_args();
        $direction = array_pop($args);
        $event = $direction ? "Путешествует в будущее: " : "Путешествует в прошлое: ";
        foreach ($args as $traveller) {
            $event .= $traveller->getRole() . " - " . $traveller->getName() . " и ";
        }
        $this->log->add(substr($event, 0, -3));
    }

    private function moveAdults($child1, $child2)
    {
        foreach ($this->adults as $adult) {
            $this->formLog($child1, $child2, true);
            $this->formLog($child1, false);
            $this->formLog($adult, true);
            $this->formLog($child2, false);
            $this->cargoNum += 4;
        }
        // returns owner and his machine to present
        $this->formLog($child1, $child2, true);
        $this->formLog($adult, false);
        $this->cargoNum += 2;
    }

    public function run()
    {
        if (count($this->children) > 2) {
            $this->moveChildren();
        }
        list($child1, $child2) = $this->children;
        $this->moveAdults($child1, $child2);
        $this->log->add(PHP_EOL . "Всего понадобилось " . $this->cargoNum . " перемещений во времени" . PHP_EOL);
        $this->log->show();
        $this->log->write();
    }
}