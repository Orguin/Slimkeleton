<?php
if ( ! path('root') ) {
    die('Restrict');
}


switch ( env() ) {
    case 'development':
        define('FACEBOOK_APP_ID', '');
        define('FACEBOOK_APP_SECRET', '');
        break;
    case 'test':
        define('FACEBOOK_APP_ID', '');
        define('FACEBOOK_APP_SECRET', '');
        break;
    case 'production':
    default:
        define('FACEBOOK_APP_ID', '');
        define('FACEBOOK_APP_SECRET', '');
        break;
}

$facebook = null;

if ( strlen(trim(FACEBOOK_APP_ID)) > 0 and strlen(trim(FACEBOOK_APP_SECRET)) > 0 ) {

    $facebook = new Facebook(
        array(
            'appId' => FACEBOOK_APP_ID,
            'secret' => FACEBOOK_APP_SECRET,
            'cookie' => true,
            'fileUpload' => true,
        )
    );

}
