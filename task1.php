<?php

require_once __DIR__.'/vendor/autoload.php';

// Фигура Queen
$queen = new \Task1\Piece\Queen;

// Установка начальных позиций
$queen->x = 1;
$queen->y = 1;

// Сделать ход фигурой
$queen->move(7,3);

// Вывести на экран текущую позицию 
echo $queen->getPosition().'<hr>';

// Фигура King
$king = new \Task1\Piece\King;

// Установка начальных позиций
$king->x = 4;
$king->y = 3;

// Сделать ход фигурой
$king->move(2,2);

// Вывести на экран текущую позицию 
echo $king->getPosition();