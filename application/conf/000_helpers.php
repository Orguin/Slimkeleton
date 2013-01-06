<?php

function path ($path)
{

    $path = strtoupper(trim($path));

    if ( isset( $GLOBALS['SK']['PATH'][$path] ) and ! empty( $GLOBALS['SK']['PATH'][$path] ) ) {
        return $GLOBALS['SK']['PATH'][$path];
    }

    return false;

}

function host ()
{

    if ( isset( $GLOBALS['SK']['HOST'] ) and ! empty( $GLOBALS['SK']['HOST'] ) ) {
        return $GLOBALS['SK']['HOST'];
    }


    $host = trim(preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST']));

    $protocol = ( isset( $_SERVER['HTTPS'] ) and ! empty( $_SERVER['HTTPS'] ) ) ? 'https' : 'http';

    $port = $_SERVER['SERVER_PORT'];


    if (('http' == $protocol && $port != 80) || ('https' == $protocol && $port != 443)) {
        $host = $host . ':' . $port;
    }

    $host = $protocol . '://' . $host;

    return $GLOBALS['SK']['HOST'] = $host;

}

function env ()
{

    if ( isset( $GLOBALS['SK']['ENV'] ) and ! empty( $GLOBALS['SK']['ENV'] ) ) {
        return  $GLOBALS['SK']['ENV'];
    }

    $environments = array(
        'development' => array('http://localhost(.*)', '(.*).dev', '(.*).local' ),
        'production' => array('(.*).com', '(.*).com.br'),
    );

    $env = 'production';

    foreach ($environments as $environment => $patterns) {
        foreach ($patterns as $pattern) {
            if ( preg_match('#'.$pattern.'\z#', host()) or $pattern == host() ) {
                $env = $environment;
                break 2;
            }
        }
    }

    return  $GLOBALS['SK']['ENV'] = $env;

}

function log ($name)
{

    $name = strtoupper(trim($name));

    if ( isset($GLOBALS['SK']['LOG'][$name]) ) {
        return $GLOBALS['SK']['LOG'][$name];
    }

    return null;

}
