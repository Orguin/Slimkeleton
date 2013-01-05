<?php

/**
 * DEFINE ENVIRONMENT
 */

$environments = array(

    'development' => array('http://localhost(.*)', '(.*).dev', '(.*).local' ),
    'production' => array('(.*).com', '(.*).com.br'),

);


$host = get_host();

foreach ( $environments as $environment => $patterns ) {
    foreach ( $patterns as $pattern ) {
        if ( preg_match( '#'.$pattern.'\z#' , $host ) or $pattern == $host ) {
            define( 'ENVIRONMENT', $environment );
            break 2;
        }
    }
}


if ( !defined('ENVIRONMENT') ) define( 'ENVIRONMENT' , 'production' );


switch ( ENVIRONMENT ) {

    case 'development':
        error_reporting(E_ALL);
        ini_set('display_errors',true);
        break;

    case 'test':
    case 'production':
    default:
        error_reporting(0);
        ini_set('display_errors',false);
        break;

}
