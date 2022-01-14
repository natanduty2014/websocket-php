<?php


namespace User\Socket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use Psr\Http\Message\RequestInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $sleep;

    public function __construct($sleep)
    {
        $this->clients = new \SplObjectStorage;
        $this->sleep = $sleep;
    }

    public function onOpen(ConnectionInterface $conn, RequestInterface $request = null)
    {
        
        /*
            "\PDO" precisa colocar a barra para nao dar conflito de class entre o codigo nativo php e o framwork
        */
        /*
        try {
            $pdo = new \PDO('mysql:host=127.0.0.1;dbname=teste', 'root', '');
        } catch (\PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
        */
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        //teste para ver o id/token do usuario
        //print_r($conn->httpRequest->getUri()->getQuery());
        //definir o id/token do usuario via url websocket para autenticação
        $key = $conn->httpRequest->getUri()->getQuery();
        //passando o paranmetro para fixar a autenticação
        $conn->resourceId = $key;
        parse_str($key,$token);
        //print_r($token);
        $conn->resourceId = $token['token'];
        echo "New connection! ({$conn->resourceId})\n";
        
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {

        /*
            $variable->resourceId ver o id/token do usuario e definir o envio de mensagem para um determinado id/token
        */
        /*
        $numRecv = count($this->clients) - 1;
        echo sprintf(
            'Connection %d sending message "%s" to %d other connection%s' . "\n",
            $from->resourceId,
            $msg,
            $numRecv,
            $numRecv == 1 ? '' : 's'
        );*/
        //print_r("\n\n\n".$msg);

        //pega o json e armazena na variavel
        $objselectmsg = json_decode($msg);
        //selecia o objeto do json específico 
        $iduser = $objselectmsg->useridto;
        go(function()
        {
            echo "Coroutine 1 is done.\n";
        });
        //seleciona o destino da msg
        foreach ($this->clients as $client) {
            if ($client->resourceId !== $iduser) {
                foreach ($this->clients as $client) {
                    //veririca se o cliente que vai receber é igual do cliente da mensagem. \\ se quiser enviar em grupo é so colocar: "!==" diferente do destinatário
                    if ($client->resourceId == $iduser) {
                        // envia msg para o cliente conectado
                        $client->send($msg);
                        //echo  "\n\n\n"." De: ".$from->resourceId. " para: ".$iduser;
                    }
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

       // echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
       echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}