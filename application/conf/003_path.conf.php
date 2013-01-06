<?php


$path['app'] = 'application';

$path['public'] = 'public';

$path['log'] = 'log';

$path['storage'] = 'storage';

$path['tmp'] = 'tmp';

$path['upload'] = 'upload';

$path['vendor'] = 'vendor';



// **************************
// END USER CONFIGURATION
// **************************



$path['root'] = realpath(dirname(__FILE__) . '/../../');

chdir($path['root']);

foreach ($paths as $name => $path) {
    $name = strtoupper($name);
    if ( ! isset($GLOBALS['SK']['PATH'][$name]) ) {
        $GLOBALS['SK']['PATH'][$name] = realpath($path) . DIRECTORY_SEPARATOR;
    }
}
