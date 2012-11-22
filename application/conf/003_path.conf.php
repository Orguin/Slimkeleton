<?php

/**
 * DEFINE PATH
 */
define( 'ROOT_PATH',         realpath( dirname(__FILE__) . '/../../' ) );

define( 'APPLICATION_PATH',  realpath( ROOT_PATH         . '/application/' ) );
define( 'PUBLIC_PATH',       realpath( ROOT_PATH         . '/public/' ) );
define( 'UPLOAD_PATH',       realpath( ROOT_PATH         . '/upload/' ) );
define( 'TMP_PATH',          realpath( ROOT_PATH         . '/tmp/' ) );
define( 'VENDOR_PATH',       realpath( ROOT_PATH         . '/vendor/' ) );

define( 'MODEL_PATH',        realpath( APPLICATION_PATH  . '/model/' ) );
define( 'ROUTE_PATH',        realpath( APPLICATION_PATH  . '/route/' ) );
define( 'MIDDLEWARE_PATH',   realpath( APPLICATION_PATH  . '/middleware/' ) );
define( 'VIEW_PATH',         realpath( APPLICATION_PATH  . '/view/' ) );
define( 'CONFIG_PATH',       realpath( APPLICATION_PATH  . '/conf/' ) );
define( 'LANG_PATH',         realpath( APPLICATION_PATH  . '/lang/' ) );

define( 'UPLOAD_IMAGE_PATH', realpath( UPLOAD_PATH       . '/image/' ) );

define( 'TMP_LANG_PATH',     realpath( TMP_PATH          . '/lang/' ) );
