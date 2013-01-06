<?php
if ( ! path('root') ) {
    die('Restrict');
}

/**
 * Autoload
 */
set_include_path(get_include_path() . PATH_SEPARATOR . path('model'));

spl_autoload_register(
    function ($className) {

        $className = (string) str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $className = stream_resolve_include_path($className . '.php');

        if ( false !== $className and file_exists($className) ) {

            include_once( $className );

        }

    }
);
