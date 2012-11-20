<?php

/**
 * Init Session
 */
if (!isset($_SESSION)) {
    session_cache_limiter(false);
    session_start();
}
