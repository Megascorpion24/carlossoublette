<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class socket implements MessageComponentInterface {
    protected $clients;
     
    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }


    public function onOpen(ConnectionInterface $conn) {
        
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {

        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}