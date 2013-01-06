<?php
if ( ! path('root') ) {
    die('Restrict');
}

/**
 * Middleware Authentication
 */

$authenticated = function ($role) use ($app, $facebook) {

    return function () use ($role, $app, $facebook) {

        switch ( $role ) {
            case 'admin':
                // TODO admin authentication
                break;
            case 'user_session':

                // verify user session

                break;
            case 'user':
            default:

                // verify user

                break;
        }

    };

};
