<?php
require_once('vendor\1\lw2\src\PizzaStore.php');
require_once('src\Nuts.php');
require_once('src\MeatWinery.php');
class Papizi extends PizzaStore
{
    public function createPizza(string $type): Pizza
    {
        if ($type === "Пицца") {
            $pizza = new Nuts("Пицца", "моянез", "квадратиком");
            $pizza->сhoiceToppings();
            return $pizza;
        }
        if ($type === "Мясная винница") {
            $pizza = new MeatWinery("Мясная винница", "кетчуп", "слайсами");
            $pizza->сhoiceToppings();
            return $pizza;
        }
    }
}

$papizi = new Papizi;
$papizi->orderPizza("Пицца");
echo ("") . PHP_EOL;
$papizi->orderPizza("Мясная винница");

