<?php

namespace Ksa\Elasticsearch;

require_once '../vendor/autoload.php';

    use Gelf\Message;
    use Gelf\Publisher;
    use Gelf\Transport\HttpTransport;

    class SendGrayLog

    {
        private $transport;

        public function buildLog(string $host,int $port,string $path){
            $this->transport = new HttpTransport($host,$port,$path);
        }

        public function sendLog(int $level, string $message, string $client_prefix = ''){

            $message_json = ['message'=>$client_prefix . ' ' . $message];

            $publisher = new Publisher();
            $publisher->addTransport($this->transport);

            $message = new Message();
            $message
            ->setShortMessage(json_encode($message_json))
            ->setLevel($level);
            $publisher->publish($message);

        }

    }
