<?php

require dirname(__DIR__) . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;

$host = 'toad.rmq.cloudamqp.com';
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

echo "consumer andando";	

function process_message($message) {
    $messageBody = json_decode($message->body, true);
    $cantidad =  $messageBody['cantidad'];
    $fechaFormato =  $messageBody['fechaFormato'];
    $hora =  $messageBody['hora'];

    $message->delivery_info['channel']->basic_ack($message->delivery_info['delivery_tag']);

    echo "json llego\n";
    echo $cantidad;
    echo "\n";
    echo $fechaFormato;
    echo "\n";
    echo $hora;
    echo "\n";
    
}


$consumerTag = 'local.imac.consumer';

$channel->basic_consume($queue, $consumerTag, false, false, false, false, 'process_message');

function shutdown($channel, $connection) {
    $channel->close();
    $connection->close();
}


register_shutdown_function('shutdown', $channel, $connection);
// Loop as long as the channel has callbacks registered
while ($channel ->is_consuming()) {
    $channel->wait();
}
?>