<?php
namespace Task1\Piece;

use Task1\AbstractChessmen;
use Task1\Message\Mesage;

class King extends AbstractChessmen
{
    use Move\Pattern;

    private function movePattern()
    {
        $name =  $this->getFigureName();

        if (abs($this->x-$this->nX) <= 1 and
            abs($this->y-$this->nY) <= 1) {
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
