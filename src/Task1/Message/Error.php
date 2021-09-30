<?php
namespace Task1\Message;

use Task1\Message\Mesage;

class Error extends Mesage
{
    protected function get(string $itm, string $coordName)
    {
        $error = match ($itm) {
            'limit' => 'Выход за поле координаты ',
            'move' => 'Ход неверный для '
        };
        $this->mes = "{$error} {$coordName}";
        $this->go();
    }
}
