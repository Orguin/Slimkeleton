<?php
if ( ! path('root') ) {
    die('Restrict');
}


$app = new \Slim\Slim(
    array(
        'mode' => env(),
        'templates.path' => path('app.view'),
        'view' => new \Slimkeleton\MustacheSlim()
    )
);

// Only invoked if mode is "production"
$app->configureMode(
    'production',
    function () use ($app) {
        $app->config(
            array(
                'log.enable' => true,
                'log.level' => \Slim\Log::WARN,
                'debug' => false
            )
        );
    }
);

// Only invoked if mode is "development"
$app->configureMode(
    'development',
    function () use ($app) {
        $app->config(
            array(
                'log.enable' => false,
                'log.level' => \Slim\Log::DEBUG,
                'debug' => true
            )
        );
    }
);

// enable cross domain
$app->response()->header('Access-Control-Allow-Origin', '*');
$app->response()->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
$app->response()->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, X-PINGOTHER');
$app->response()->header('Access-Control-Allow-Credentials', 'true');
$app->response()->header('Access-Control-Max-Age', 86400);

// all methods return json content
$app->response()->header('Content-Type', mime('txt'));

// replace 404
$app->notFound(
    function () use ($app) {
        echo json_encode(array('error'=>404, 'message'=>'not found'));
    }
);

// replace ERROR
$app->error(
    function (\Exception $e) use ($app) {
        echo json_encode(array('error'=>500, 'message'=> $e->getMessage()));
    }
);
