<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:57
 */

namespace App;

class Log
{
    private $path;
    private $log;

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function add($event)
    {
        $this->log .= $event . PHP_EOL;
    }

    public function show()
    {
        echo $this->log;
    }

    public function write()
    {
        try {
            if (!file_put_contents($this->path, $this->log, FILE_APPEND)) {
                throw new \Exception("Cannot write to file");
            }
        } catch (\Exception $e) {
            echo "Error: file - " . $e->getFile() . ", line - " . $e->getLine() . ": " . $e->getMessage();
        }
    }
}