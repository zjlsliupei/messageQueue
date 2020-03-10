<?php
//phpinfo();
//die();
include '../vendor/autoload.php';

$mq = \liupei\messageQueue\MessageQueue::newMQ('Redis', [
    'host' => '127.0.0.1',
    'password' => '',
    'port' => 6379,
    'select' => 0
]);
var_dump($mq->add('test', "name", "liupei"));