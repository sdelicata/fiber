<?php

function sub1()
{
    // yield from sub call
    return Fiber::yield(1);
}
$fiber = new Fiber(function ($a, $b) {
    $c = Fiber::yield($a + $b);

    $d = sub1();
    return $d.$c;
});

echo $fiber->resume(1, 2);     // echo 3
echo $fiber->resume("world");  // echo 1
echo $fiber->resume("hello "); // echo "hello world"