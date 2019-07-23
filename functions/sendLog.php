<?php

require_once 'getGraylogServerParameters.php';

function sendLogs( int $log_level,string $log, string $client_prefix = '', array $additional_parameters = []){
    $message_json = ['message'=>$client_prefix . ' ' . $log];
    $server_parameters = getGraylogServerParameters();

    $transportHTTP = new Gelf\Transport\HttpTransport(
        $server_parameters['host'],
        $server_parameters['port'],
        $server_parameters['path']
    );
    $publisher = new Gelf\Publisher();
    $publisher->addTransport($transportHTTP);

    $message = new Gelf\Message();
    $message
        ->setFullMessage($additional_parameters)
        ->setShortMessage(json_encode($message_json))
        ->setLevel($log_level);


    $publisher->publish($message);
    
}
