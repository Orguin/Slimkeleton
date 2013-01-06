<?php

function path ($path, $create = false)
{

    $paths = explode('.', $path);

    $parent = strtoupper(trim(shift($paths)));

    if ( isset( $GLOBALS['SK']['PATH'][$path] ) and ! empty( $GLOBALS['SK']['PATH'][$path] ) ) {

        $parent = $GLOBALS['SK']['PATH'][$path];

        if ( !empty($paths) ) {
            foreach ($paths as $child) {

                if ( ! file_exists($parent . $child) ) {

                    if ( ! $create ) {
                        continue;
                    }

                    mkdir($parent . $child, 0755);

                }

                $parent = realpath($parent. $child) . DIRECTORY_SEPARATOR;

            }
        }

        return $parent;

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

function conf ($conf, $default = null)
{

    if ( ! $conf ) {
        return null;
    }

    $confs = explode('.', $conf);

    $parent = strtoupper(trim(shift($confs)));

    if ( isset( $GLOBALS['SK'][$parent] ) ) {

        $parent = $GLOBALS['SK'][$parent];

        if ( !empty($confs) ) {
            foreach ($confs as $child) {

                if ( ! isset($parent[$child]) ) {
                    return conf($default);
                }

                $parent = $parent[$child];

            }
        }

        return $parent;

    }

    return $conf;

}

function facebook ($conf = 'facebook')
{

    return conf('facebook.' . $conf, 'facebook.facebook');

}

function mime ($type)
{

    return conf('mimes.' . $type, 'mimes.txt');

}

function log ($name)
{

    return conf('log.' . $name);

}

function debug ($msg, $die = false)
{

    echo '<hr>';
    echo '<pre>';
    print_r($msg);
    echo '</pre>';

    if ( $die ) {
        die();
    }

}
