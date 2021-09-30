<?php
namespace Task1;

abstract class AbstractChessmen implements Ichessmen
{
    public int $x;
    public int $y;

    public function getPosition()
    {
        return "x = {$this->x}, y = {$this->y} <br>";
    }
}
