<?php

/*
 * Configuration
 */
require realpath(dirname(__FILE__) . '/../application/conf/load.conf.php');

/**
 * Require all middleware
 */
$filename='';
foreach (glob(path('middleware') . "/*.php") as $filename) {
    require $filename;
}

/**
 * Require all routes
 */
$filename='';
foreach (glob(path('route') . "/*.php") as $filename) {
    require $filename;
}

/*
 * Run app
 */
$app->run();
