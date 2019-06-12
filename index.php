<?php

use app\EightyByTenToTenStrategy;
use app\ABTesting;

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});

$testingData = ["a", "b", "c"];
$distribution = new EightyByTenToTenStrategy();
$ab = new ABTesting($distribution, $testingData);
$ab->run();
