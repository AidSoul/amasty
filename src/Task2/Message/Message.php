<?php
namespace Task2\Message;

class Message
{
    public function output(array $itm)
    {
        $count = 0;
        foreach ($itm as $a) {
            foreach ($a as $b) {
                $count++;
                $br = '';
                if ($count == 5) {
                    $count = 0;
                    $br = '<br>';
                }
                // echo '<div style="color:'.$a['color'].'">'.$a['name']." ---> {$a['color']}</div>";
                echo '<span style="font-size: 30px;color:'.$b['color'].'">'.$b['name']." </span>".$br;
            }
        }
    }
}
