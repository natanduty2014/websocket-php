<?php


require 'vendor/autoload.php';
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use User\Socket\Chat;
use Swoole\Coroutine as Co;

Co\run(function()
{

class teste{

    public $sleep;

    public function websocket(){     
        $chat = new chat($this->sleep);
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    $chat
                )
            ),
            9503
        );
        
        $server->run();
     }
}




$a = new teste;
$a->sleep = 20;
$a->websocket();
});