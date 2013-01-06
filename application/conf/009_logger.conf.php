<?php
if ( ! path('root') ) {
    die('Restrict');
}

$channels = array(
    'App'
);
$stream = new \Monolog\Handler\StreamHandler(path('log') . '/application.log', \Monolog\Logger::WARNING);
$firephp = new \Monolog\Handler\FirePHPHandler();

foreach ($channels as $channel) {
    $channel = strtoupper(trim($channel));
    $GLOBALS['SK']['LOG'][$channel] = new \Monolog\Logger($channel);
    $GLOBALS['SK']['LOG'][$channel]->pushHandler($stream);
    $GLOBALS['SK']['LOG'][$channel]->pushHandler($firephp);
    $GLOBALS['SK']['LOG'][$channel]->pushProcessor(\Monolog\Processor\IntrospectionProcessor);
    $GLOBALS['SK']['LOG'][$channel]->pushProcessor(\Monolog\Processor\WebProcessor);
}
