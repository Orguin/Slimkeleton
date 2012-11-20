<?php if ( ! defined( 'ROOT_PATH' ) ) die('Restrict');


switch ( ENVIRONMENT ) {

    case 'development':
        define('DB_NAME','your_db');
        define('DB_HOST','localhost');
        define('DB_USER','root');
        define('DB_PASS','root');
        break;

    case 'testing':
        define('DB_NAME','');
        define('DB_HOST','');
        define('DB_USER','');
        define('DB_PASS','');
        break;

    case 'production':
    default:
        define('DB_NAME','');
        define('DB_HOST','');
        define('DB_USER','');
        define('DB_PASS','');
        break;

}


//BaseMongoRecord::$connection = new Mongo( 'mongodb://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME );
//BaseMongoRecord::$database = DB_NAME;
