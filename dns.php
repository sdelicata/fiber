<?php

require_once __DIR__.'/vendor/autoload.php';

use Fiber\Helper as f;

f\once(function () {
    $ips = f\dig('google.com');
    var_dump($ips);
});