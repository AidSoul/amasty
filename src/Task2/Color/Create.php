<?php
namespace Task2\Color;

use Task2\Color\Color;

class Create extends Color
{
    private array $all;

    private function addForArray()
    {
        for ($i=0; $i < $this->count; $i++) {
            parent::get();
            $this->all[] = $this->uniteColor;
        }
    }

    public function get():array
    {
        $this->addForArray();
        return $this->all;
    }
}
