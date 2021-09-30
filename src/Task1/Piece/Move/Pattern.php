<?php
namespace Task1\Piece\Move;

trait Pattern
{
    private int $nX;
    private int $nY;
    
    private function getFigureName()
    {
        return (new \ReflectionClass(get_called_class()))->getShortName();
    }

    private function moveFigure(int $x, int $y)
    {
        $this->nX = $x;
        $this->nY = $y;
        $coord = new \Task1\Board\Coord;
        $coord->checkCoord($x, $y);
        if ($coord->getStatus()) {
            $this->movePattern();
        }
        $this->x = $x;
        $this->y = $y;
    }
}
