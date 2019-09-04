<?php

require_once __DIR__.'/vendor/autoload.php';

use Fiber\Helper as f;
f\once(function () {
    echo date("i:s\n");
    f\sleep(2000);
    echo date("i:s\n");
});