<?php
if ( ! path('root') ) {
    die('Restrict');
}
/**
 * Route /
 *
 * Verify login and redirect
 *
 * @name Index
 * @via get
 */
$app->get(
    '/',
    $authenticated('user'),
    function () use ($app, $facebook) {

        // user is logged

    }
)->name('Index');
