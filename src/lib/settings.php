<?php
    /* Self explanatory? */

    $GLOBALS["ip_website"] = "http://ipinfo.io/";
    $GLOBALS["date_format"] = "Y-m-d";
    $GLOBALS["time_format"] = "H:i:s";
    $GLOBALS["log_folder"] = dirname(__FILE__, 2) . "/logs/"; /* Ugh... 1+ point for Python. PHP's relative paths are a pain in the fucking ass. */

    /* To be honest here, I see the faults of PHP. No standard library system seems strange and weird, whereas python has many libraries to choose from. You also have PIP. I tried getting PHP's package manager, but I couldn't figure out how to get it to work for hours on end. Absolute disaster. */
    /* Still. PHP is so easy to use that I believe it is almost not necessary. */
?>