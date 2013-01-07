<?php

switch ( env() ) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', true);
        ini_set('log_errors', true);
        break;
    case 'test':
    case 'production':
    default:
        error_reporting(-1);
        ini_set('display_errors', false);
        ini_set('log_errors', true);
        break;
}
