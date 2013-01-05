<?php

function get_host () {

    $host = trim( preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST']) );

    $protocol = ( isset( $_SERVER['HTTPS'] ) and ! empty( $_SERVER['HTTPS'] ) ) ? 'https' : 'http';

    $port = $_SERVER['SERVER_PORT'];


    if (('http' == $protocol && $port != 80) || ('https' == $protocol && $port != 443)) {
        $host = $host . ':' . $port;
    }

    return $protocol . '://' . $host;

}
