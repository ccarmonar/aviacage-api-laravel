<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;


$host = 'toad-01.rmq.cloudamqp.com';
$port = 5672;
$user = 'tuykqsbn';
$pass = 'k8PceRIon7awLwPMvgrbNGH0oApLkMdq';
$vhost = 'tuykqsbn';
$exchange = 'subscribers';
$queue = 'aviacage_subscribers';



$connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
$channel = $connection->channel();
$channel->queue_declare($queue, false, true, false, false);
$channel->exchange_declare($exchange, AMQPExchangeType::DIRECT, false, true, false);
$channel->queue_bind($queue, $exchange);


$messageBody = json_encode([
	'cantidad' => 300,
	'fecha' => '2020-01-01',
	'hora' => '10:10:10'
]);



$message = new AMQPMessage($messageBody, array(
	'content_type' => 'application/json', 
	'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
));


$channel->basic_publish($message, $exchange);



echo "json envia3\n";

$channel->close();
$connection->close();

?>