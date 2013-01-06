<?php
if ( ! path('root') ) {
    die('Restrict');
}


switch ( env() ) {
    case 'development':
        define('DB_DRIVER', 'mongodb'); // mongodb, mysql, pgsql, oci, sqlite
        define('DB_FILE', ''); // only sqlite
        define('DB_NAME', 'your_db');
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', 'root');
        break;
    case 'test':
        define('DB_DRIVER', 'mongodb'); // mongodb, mysql, pgsql, oci, sqlite
        define('DB_FILE', ''); // only sqlite
        define('DB_NAME', '');
        define('DB_HOST', '');
        define('DB_USER', '');
        define('DB_PASS', '');
        break;
    case 'production':
    default:
        define('DB_DRIVER', 'mongodb'); // mongodb, mysql, pgsql, oci, sqlite
        define('DB_FILE', ''); // only sqlite
        define('DB_NAME', '');
        define('DB_HOST', '');
        define('DB_USER', '');
        define('DB_PASS', '');
        break;
}

if ( 'mongodb' === DB_DRIVER ) {

    BaseMongoRecord::$connection = new Mongo('mongodb://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME);
    BaseMongoRecord::$database = DB_NAME;

} else {

    $dbcfg = ActiveRecord\Config::instance();

    $dbcfg->set_model_directory(path('model'));

    if ( 'sqlite' === DB_DRIVER ) {

        $dbcfg->set_connections(
            array(
                env() => 'sqlite:' . DB_FILE
            )
        );

    } else {

        $dbcfg->set_connections(
            array(
                env() => DB_DRIVER . '://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME
            )
        );

    }

    ActiveRecord\Config::initialize(
        function ($dbcfg) {
            $dbcfg->set_default_connection(env());
        }
    );

}
