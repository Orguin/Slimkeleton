<?php if ( ! defined( 'ROOT_PATH' ) ) die('Restrict');

/**
 * Route /
 *
 * Verify login and redirect
 *
 * @name Index
 * @via get
 */
$app->get('/', $authenticated('user'), function () use ($app,$facebook) {

    // user is logged

})->name('Index');
