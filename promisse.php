<?php

Swoole\Runtime::enableCoroutine();

go(static function () {
    sleep(1);
    echo 'a';
});

go(static function () {
    sleep(2);
    echo 'b';
   echo Co::gethostbyname('www.google.com');

});
echo "huba";