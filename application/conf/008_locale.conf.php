<?php
if ( ! path('root') ) {
    die('Restrict');
}

$GLOBALS['SK']['LANG']['DEFAULT'] = 'pt';

$i18n = new i18n(path('app.lang') . '/lang_{LANGUAGE}.yml', path('tmp.lang', true), conf('lang.default'));
$i18n->init();
