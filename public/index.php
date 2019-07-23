<?php


require_once '../src/SendGrayLog.php';
require_once '../functions/getGraylogServerParameters.php';
require_once '../functions/sendLog.php';

//отправка через класс
    //$test =  new Ksa\Elasticsearch\SendGrayLog();
    //$test->buildLog('log.certit.ru',12201,'/gelf');
    //$test->sendLog(2,'exception','ksa');

//через функцию
    sendLogs(3,'no prefix', 'ksa',[12,453,67]);



?>
