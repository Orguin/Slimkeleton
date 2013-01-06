<?php

/**
 * DEFINE PATH
 */
$GLOBALS['SK']['PATH']['ROOT'] = realpath(dirname(__FILE__) . '/../../');

$GLOBALS['SK']['PATH']['APPLICATION'] = realpath(path('root') . '/application/');
$GLOBALS['SK']['PATH']['PUBLIC'] = realpath(path('root') . '/public/');
$GLOBALS['SK']['PATH']['UPLOAD'] = realpath(path('root') . '/upload/');
$GLOBALS['SK']['PATH']['TMP'] = realpath(path('root') . '/tmp/');
$GLOBALS['SK']['PATH']['LOG'] = realpath(path('root') . '/log/');
$GLOBALS['SK']['PATH']['VENDOR'] = realpath(path('root') . '/vendor/');

$GLOBALS['SK']['PATH']['MODEL'] = realpath(path('application') . '/model/');
$GLOBALS['SK']['PATH']['ROUTE'] = realpath(path('application') . '/route/');
$GLOBALS['SK']['PATH']['MIDDLEWARE'] = realpath(path('application') . '/middleware/');
$GLOBALS['SK']['PATH']['VIEW'] = realpath(path('application') . '/view/');
$GLOBALS['SK']['PATH']['CONFIG'] = realpath(path('application') . '/conf/');
$GLOBALS['SK']['PATH']['LANG'] = realpath(path('application') . '/lang/');

$GLOBALS['SK']['PATH']['UPLOAD_IMAGE'] = realpath(path('upload') . '/image/');

$GLOBALS['SK']['PATH']['TMP_LANG'] = realpath(path('tmp') . '/lang/');
