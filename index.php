<?php
/**
 * Created by PhpStorm.
 * User: Colls
 * Date: 07.09.15
 * Time: 15:28
 */
require_once __DIR__ . '/vendor/autoload.php';

$familyConfig = include __DIR__ . "/config/config.php";
$logPath = __DIR__ . "/log/travel.log";

$generator = new \App\PeopleGenerator($familyConfig);
$travellers = $generator->run();

$app = new \App\App($travellers);
$app->getLog()->setPath($logPath);
$app->run();