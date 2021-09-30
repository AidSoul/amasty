<?php
namespace Task1\Board;

use Task1\Message\Mesage;

class Coord
{
    private int $maxLimit = 8;
    private array $status = [];

    public function checkCoord(int $x, int $y)
    {
        $coord = ['x'=> $x,'y'=> $y];

        foreach ($coord as $k=>$v) {
            if ($v > $this->maxLimit) {
                Mesage::create()->type('error', 'limit', $k);
                $this->status[$k][] = false;
            }
        }
    }

    public function getStatus(): bool 
    {
        return count($this->status) > 0 ? false: true;
    }
}
