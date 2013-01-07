<?php
if ( ! path('root') ) {
    die('Restrict');
}

/**
 * Require vendor libs
 */
require path('vendor') . '/autoload.php';

require path('vendor') . '/Slimkeleton/View/Mustache.php';
