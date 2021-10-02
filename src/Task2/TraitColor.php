<?php
namespace Task2\Color;

trait Color{

    // $cout = count($this->uniteColor);
    // if ($cout > $this->count) {
    //     $total = $cout - $this->count;
    //     $keys = array_keys($this->uniteColor);
    //     for ($k=0; $k < $total; $k++) {
    //         unset($this->uniteColor[$keys[$k]]);
    //     }
    // }
    private function checkNotComplete()
    {
        $cout = count($this->uniteColor);
        if ($cout > $this->count) {
            $total = $cout - $this->count;
            $keys = array_keys($this->uniteColor);
            for ($k=0; $k < $total; $k++) {
                unset($this->uniteColor[$keys[$k]]);
            }
        }
    }
}