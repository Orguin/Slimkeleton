<?php


$paths['app'] = 'application';

$paths['public'] = 'public';

$paths['log'] = 'log';

$paths['storage'] = 'storage';

$paths['tmp'] = 'tmp';

$paths['upload'] = 'upload';

$paths['vendor'] = 'vendor';



// **************************
// END USER CONFIGURATION
// **************************



$paths['root'] = realpath(dirname(__FILE__) . '/../../');

chdir($paths['root']);

foreach ($paths as $name => $path) {
    $name = strtoupper($name);
    if ( ! isset($GLOBALS['SK']['PATH'][$name]) ) {
        $GLOBALS['SK']['PATH'][$name] = realpath($path) . DIRECTORY_SEPARATOR;
    }
}
