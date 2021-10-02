<?php
namespace Task2\Color;

class Color
{
    private array $color = ['FF0000','0000FF','008000','FFFF00','00FF00','FF00FF','000000','FFD700','808080','FF6347'];
    private array $colorName = ['red','blue','green', 'yellow','lime','magenta','black','gold','gray','tomato'];
    private array $join;


    protected array $uniteColor = [];

    protected int $count = 5;
    
    private function createColor()
    {
        for ($i = 0; $i < $this->count; $i++) {
            $this->uniteColor[$i]['name'] = $this->colorName[$i];
            $this->uniteColor[$i]['color'] = $this->color[$i];
        }
    }

    private function check()
    {
        // удаляем одинаковые элементы в массиве
        $this->uniteColor = array_unique($this->uniteColor, SORT_REGULAR);
        foreach ($this->join as $a=>$b) {
            foreach ($this->uniteColor as $k=>$v) {
                if ($v['name'] == $a && $v['color'] == $b) {
                    unset($this->uniteColor[$k]);
                }
            }
        }
    }

    
    protected function goFive()
    {
        $this->join = array_combine($this->colorName, $this->color);

        shuffle($this->color);
        shuffle($this->colorName);

        $this->createColor();
        $this->check();
        $this->checkNotComplete();
    }

    private function checkNotComplete()
    {
        $count = count($this->uniteColor);
        for ($i=0; $i <  $this->count-$count; $i++) {
            $this->goFive();
        }
              
        
        // $cout = count($this->uniteColor);
        
        // if ($cout > $this->count) {
        //     $total = $cout - $this->count;

        //     $keys = array_keys($this->uniteColor);

        //     for ($k=0; $k < $total; $k++) {
        //         unset($this->uniteColor[$keys[$k]]);
        //     }
        // }
    }

    protected function get()
    {
        $this->goFive();
    }
}
