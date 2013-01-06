<?php

switch ( env() ) {
    case 'development':
        error_reporting(E_ALL);
        ini_set('display_errors', true);
        break;
    case 'test':
    case 'production':
    default:
        error_reporting(0);
        ini_set('display_errors', false);
        break;
}
