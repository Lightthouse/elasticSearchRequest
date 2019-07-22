<?php

function getGraylogServerParameters(){

    $server_settings = json_decode(file_get_contents(__DIR__.'/'.'server_settings.json'));

    $host = $server_settings->host;
    $port = $server_settings->port;
    $path = $server_settings->path;

    $parameters = ['host'=>$host,'port'=>$port,'path'=>$path];

    return $parameters;
}
