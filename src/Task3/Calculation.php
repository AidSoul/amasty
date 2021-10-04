<?php
namespace Task3;

use Task3\CashMachine;

class Calculation extends CashMachine
{
    /**
     * Buffer
     */
    private array $ans;

    /**
     * Сумма введенная пользователем
     */
    private int $amount;

    /**
     * Массив для отправки результата
     */
    private array $go = ['Пусто'];

    private function bank()
    {
        $this->amount = $_POST['amount'];
        $this->parValut=[5,10,20,50,100,200,500];
        $this->ans[0]=0;
                
        for ($m = 1; $m <= $this->amount; ++$m) {
            $this->ans[$m] = PHP_INT_MAX;
            for ($i = 0; $i < count($this->parValut); ++$i) {
                if ($m >= $this->parValut[$i] &&
                        $this->ans[$m - $this->parValut[$i]]+1 < $this->ans[$m]) {
                    $this->ans[$m] = $this->ans[$m-$this->parValut[$i]]+1;
                }
            }
        }
    }

    /**
     * Выдача купюр
     */
    private function extradition()
    {
        $this->bank();
        if ($this->ans[$this->amount] == PHP_INT_MAX) {
            // Ошибка 2
            $this->ifNot();
        } else {
            while ($this->amount > 0) {
                for ($i = 0;$i < count($this->parValut); ++$i) {
                    if ($this->ans[$this->amount-$this->parValut[$i]] == $this->ans[$this->amount]-1) {
                        $this->go[] = $this->parValut[$i];
                        $this->amount-=$this->parValut[$i];
                        break;
                    }
                }
            }
            $this->message();
        }
    }

    /**
     * Вывод двух ближайших сумм
     * 
     */
    private function ifNot()
    {
        $numArr = [1,5,10];
        $numbers = str_split($this->amount);
        $num = array_pop($numbers);

        // Определяем к какой цифре ближе цифра
        $n =  array_reduce($numArr, function ($carry, $item) use ($num) {
            return $item <= $num? max($carry, $item): $carry;
        });
  
            $send = 0;
            switch($n){
                case 1:
                    $a = $this->amount-$num;       
                break;
                case 5:
                    $a = ($this->amount-$num)+5;          
                break;
            }
            if($num > 0){
            $send = [$a,$a+5];
            }
            else {
                $send = [$a+5];
            }


        $this->go = ['error'=> 2, 'data'=> $send];
    }

    private function message()
    {
        $ans = [];
        foreach ($this->parValut as $k=>$v) {
            $count = 0;
            if (in_array($v, $this->go)) {
                foreach ($this->go as $g) {
                    if ($v == $g) {
                        $count++;
                        $ans[$v] = $count;
                    }
                }
            } else {
                $ans[$v] = 0;
            }
        }

        $this->go = $ans;
    }

    public function getAmount()
    {
        if (isset($_POST['amount'])) {
            if (!empty($_POST['amount'])) {
                $this->extradition();
            } else {
                  // Ошибка 1
                $this->go = ['error'=>1];
            }
        }
        return $this->go;
    }
}
