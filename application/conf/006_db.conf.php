<?php
if ( ! path('root') ) {
    die('Restrict');
}


switch ( env() ) {
    case 'development':
        $GLOBALS['SK']['DB']['DRIVER'] = 'sqlite'; // mongodb, mysql, pgsql, oci, sqlite
        $GLOBALS['SK']['DB']['FILE'] = 'test.db'; // only sqlite
        $GLOBALS['SK']['DB']['NAME'] = '';
        $GLOBALS['SK']['DB']['HOST'] = '';
        $GLOBALS['SK']['DB']['USER'] = '';
        $GLOBALS['SK']['DB']['PASS'] = '';
        break;
    case 'test':
        $GLOBALS['SK']['DB']['DRIVER'] = 'sqlite'; // mongodb, mysql, pgsql, oci, sqlite
        $GLOBALS['SK']['DB']['FILE'] = 'test.db'; // only sqlite
        $GLOBALS['SK']['DB']['NAME'] = '';
        $GLOBALS['SK']['DB']['HOST'] = '';
        $GLOBALS['SK']['DB']['USER'] = '';
        $GLOBALS['SK']['DB']['PASS'] = '';
        break;
    case 'production':
    default:
        $GLOBALS['SK']['DB']['DRIVER'] = 'sqlite'; // mongodb, mysql, pgsql, oci, sqlite
        $GLOBALS['SK']['DB']['FILE'] = 'test.db'; // only sqlite
        $GLOBALS['SK']['DB']['NAME'] = '';
        $GLOBALS['SK']['DB']['HOST'] = '';
        $GLOBALS['SK']['DB']['USER'] = '';
        $GLOBALS['SK']['DB']['PASS'] = '';
        break;
}

if ( 'mongodb' === $GLOBALS['SK']['DB']['DRIVER'] ) {

    BaseMongoRecord::$connection = new Mongo(
        'mongodb://'
        . $GLOBALS['SK']['DB']['USER'] . ':'
        . $GLOBALS['SK']['DB']['PASS'] . '@'
        . $GLOBALS['SK']['DB']['HOST'] . '/'
        . $GLOBALS['SK']['DB']['NAME']
    );
    BaseMongoRecord::$database = $GLOBALS['SK']['DB']['NAME'];

} else {

    $dbcfg = ActiveRecord\Config::instance();

    $dbcfg->set_model_directory(path('app.model'));

    if ( 'sqlite' === $GLOBALS['SK']['DB']['DRIVER'] ) {

        $dbcfg->set_connections(
            array(
                env() => 'sqlite:' . path('storage.database', true) . $GLOBALS['SK']['DB']['FILE']
            )
        );

    } else {

        $dbcfg->set_connections(
            array(
                env() => (
                    $GLOBALS['SK']['DB']['DRIVER'] . '://'
                    . $GLOBALS['SK']['DB']['USER'] . ':'
                    . $GLOBALS['SK']['DB']['PASS'] . '@'
                    . $GLOBALS['SK']['DB']['HOST'] . '/'
                    . $GLOBALS['SK']['DB']['NAME']
                )
            )
        );

    }

    ActiveRecord\Config::initialize(
        function ($dbcfg) {
            $dbcfg->set_default_connection(env());
        }
    );

}
