<?php
if ( ! path('root') ) {
    die('Restrict');
}

$GLOBALS['SK']['FACEBOOK']['FACEBOOK'] = null;

switch ( env() ) {
    case 'development':
        $GLOBALS['SK']['FACEBOOK']['APP_ID'] = '';
        $GLOBALS['SK']['FACEBOOK']['APP_SECRET'] = '';
        break;
    case 'test':
        $GLOBALS['SK']['FACEBOOK']['APP_ID'] = '';
        $GLOBALS['SK']['FACEBOOK']['APP_SECRET'] = '';
        break;
    case 'production':
    default:
        $GLOBALS['SK']['FACEBOOK']['APP_ID'] = '';
        $GLOBALS['SK']['FACEBOOK']['APP_SECRET'] = '';
        break;
}

if ( strlen(trim(facebook('APP_ID'))) > 0 and
    strlen(trim(facebook('APP_SECRET'))) > 0 ) {

    $GLOBALS['SK']['FACEBOOK']['FACEBOOK'] = new Facebook(
        array(
            'appId' => facebook('APP_ID'),
            'secret' => facebook('APP_SECRET'),
            'cookie' => true,
            'fileUpload' => true,
        )
    );

}
