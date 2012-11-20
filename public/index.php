<?php

/*
 * Configuration
 */
require realpath( dirname( __FILE__ ) . '/../application/conf/load.conf.php' );

/**
 * Require all middleware
 */
$filename='';
foreach ( glob( MIDDLEWARE_PATH . "/*.php") as $filename ) {
    require $filename;
}

/**
 * Require all routes
 */
$filename='';
foreach ( glob( ROUTE_PATH . "/*.php") as $filename ) {
    require $filename;
}

/*
 * Run app
 */
$app->run();
