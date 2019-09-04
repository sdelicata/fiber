<?php

require_once __DIR__.'/vendor/autoload.php';

use Fiber\Helper as f;
use Fiber\Util\Channel;
f\once(function () {
    $c = new Channel;
    f\go(function () use($c) {
        $http = \Fiber\Http\Client::create(['base_uri' => 'http://google.com']);
        $response = $http->request('GET', '/');
        $c->write($response->getBody());
    });
    f\go(function () use($c) {
        $http = \Fiber\Http\Client::create(['base_uri' => 'http://google.fr']);
        $response = $http->request('GET', '/');
        $c->write($response->getBody());
    });
    f\go(function () use($c) {
        $http = \Fiber\Http\Client::create(['base_uri' => 'http://amazon.com']);
        $response = $http->request('GET', '/');
        $c->write($response->getBody());
    });
    echo $c->read();
    echo $c->read();
    echo $c->read();
});