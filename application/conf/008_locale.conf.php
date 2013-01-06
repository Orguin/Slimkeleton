<?php
if ( ! path('root') ) {
    die('Restrict');
}


$i18n = new i18n(path('lang') . '/lang_{LANGUAGE}.yml', path('tmp_lang'), 'pt');
$i18n->init();
