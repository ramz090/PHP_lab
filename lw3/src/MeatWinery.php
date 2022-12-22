<?php
require_once('vendor\1\lw2\src\Pizza.php');

class MeatWinery extends Pizza
{
    public function __construct(string $name, string $sauce, string $shape)
    {
        $this->name = $name;
        $this->sauce = $sauce;
        $this->shape = $shape;
    }
    public function сhoiceToppings(): void
    {
        for ($i = 0; $i < 3; $i++) {
            echo ("Выбор начинки(");
            echo $i + 1;
            echo ("/3)") . PHP_EOL;
            echo ("1 - соль") . PHP_EOL;
            echo ("2 - оливки") . PHP_EOL;
            echo ("3 - перец") . PHP_EOL;
            $choise = readline("Выбор: ");
            if ($choise == 1) {
                $this->toppings[$i] = "мясо";
            }
            if ($choise == 2) {
                $this->toppings[$i] = "трюфель";
            }
            if ($choise == 3) {
                $this->toppings[$i] = "чедер";
            }
        }
    }
}
