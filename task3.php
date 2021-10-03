<?php
require_once __DIR__.'/vendor/autoload.php';
use Task3\Calculation;
    $a = new Calculation();
echo json_encode($a->getAmount());
?>
