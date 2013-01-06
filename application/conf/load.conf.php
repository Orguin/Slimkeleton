<?php

/**
 * Require config files
 */
foreach (glob(dirname(__FILE__) . "/*.conf.php") as $filename) {

    if ( false !== strstr($filename, basename(__FILE__)) ) {
        continue;
    }

    require $filename;

}
