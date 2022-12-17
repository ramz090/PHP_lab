<?php
require_once "Snack.php";
abstract class ChocolateFactory
{
    abstract function createSnack(string $type): Snack;
    public function orderSnack(string $type): void
    {
        print ("Здравствуйте, вас приветствует шоколадная фабрика.") . PHP_EOL;
        $snack = $this->createSnack($type);
        $snack->prepare();
        $snack->cut();
    }
}
