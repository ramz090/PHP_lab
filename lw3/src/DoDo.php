<?php
require_once('vendor\1\lw2\src\PizzaStore.php');
require_once('src\Peperoni.php');
require_once('src\FourCheeses.php');
class DoDo extends PizzaStore
{
    public function createPizza(string $type): Pizza
    {
        if ($type === "Пеперони") {
            $pizza = new Peperoni("Пеперони", "томатный", "кубиком");
            $pizza->сhoiceToppings();
            return $pizza;
        }
        if ($type === "Четыре сыра") {
            $pizza = new fourCheeses("Четыре сыра", "без соуса", "круглешком");
            $pizza->сhoiceToppings();
            return $pizza;
        }
    }
}

$doDo = new DoDo;
$doDo->orderPizza("Пеперони");
echo ("") . PHP_EOL;
$doDo->orderPizza("Четыре сыра");
