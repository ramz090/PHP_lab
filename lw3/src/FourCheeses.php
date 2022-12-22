<?php
require_once('vendor\1\lw2\src\Pizza.php');

class FourCheeses extends Pizza
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
            echo ("1 - оливки") . PHP_EOL;
            echo ("2 - сыр с плесенью") . PHP_EOL;
            echo ("3 - халапеньо") . PHP_EOL;
            $choise = readline("Выбор: ");
            if ($choise == 1) {
                $this->toppings[$i] = "оливки";
            }
            if ($choise == 2) {
                $this->toppings[$i] = "сыр с плесенью";
            }
            if ($choise == 3) {
                $this->toppings[$i] = "халапеньо";
            }
        }
    }
}
