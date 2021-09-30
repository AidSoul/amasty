<?php
namespace Task1\Message;

class Mesage
{
    protected string $mes = '';

    public static function create()
    {
        return new static();
    }

    public function type(string $typeMes, string $nameMes, string $coordName = '')
    {
        $this->coordName = $coordName;
        $classPath = __NAMESPACE__ .'\\'.$typeMes;
        $class = new $classPath;
        $class->get($nameMes, $coordName);
    }

    protected function go()
    {
        echo $this->mes. '<br>';
    }
}
