<?php
require_once __DIR__.'/vendor/autoload.php';



$create = new Task2\Color\Create;
$a = $create->get();
$message = new Task2\Message\Message;
$message->output($a);

echo '<br>';

echo count($a);
