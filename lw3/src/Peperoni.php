<?php
require_once('vendor\1\lw2\src\Pizza.php');

class Peperoni extends Pizza
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
            echo ("1 - сыр") . PHP_EOL;
            echo ("2 - колбаса") . PHP_EOL;
            echo ("3 - халапеньо") . PHP_EOL;
            $choise = readline("Выбор: ");
            if ($choise == 1) {
                $this->toppings[$i] = "Сыр";
            }
            if ($choise == 2) {
                $this->toppings[$i] = "колбаса";
            }
            if ($choise == 3) {
                $this->toppings[$i] = "халапеньо";
            }
        }
    }
}
