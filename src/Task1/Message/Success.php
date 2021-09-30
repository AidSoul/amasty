<?php
namespace Task1\Message;

use Task1\Message\Mesage;

class Success extends Mesage
{
    protected function get(string $itm, string $coordName)
    {
        $success =  match ($itm) {
            'move' => 'Такой ход возможен для'
        };
        $this->mes = "{$success} {$coordName}";
        $this->go();
    }
}
