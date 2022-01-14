<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use User\Socket\Chat;
use Swoole\Coroutine as Co;

Co\run(function()
{
    go(function()
    {

        require '../vendor/autoload.php';
        $a = new chat(8);
        $a->dbi();
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    $a
                )
            ),
            9503
        );
        
        $server->run();
    });

});


