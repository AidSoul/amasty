<?php
namespace Task1\Piece;

use Task1\AbstractChessmen;
use Task1\Message\Mesage;

class Queen extends AbstractChessmen
{
    use Move\Pattern;

    private function movePattern()
    {
        $name =  $this->getFigureName();

        if (abs($this->x - $this->nX) ==
            abs($this->y - $this->nY) or
            $this->x == $this->nX  or
            $this->y == $this->nY) {
            Mesage::create()->type('success', 'move', $name);
        } else {
            Mesage::create()->type('error', 'move', $name);
        }
    }
    
    public function move(int $x, int $y)
    {
        $this->moveFigure($x, $y);
    }
}
