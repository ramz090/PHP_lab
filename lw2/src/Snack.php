<?php
abstract class Snack
{
    public string $name;
    public string $chocolate;
    /**
     * @var string[] $toppings
     */
    public array $toppings;
    public string $shape;
    public function prepare(): void
    {
        echo ("Началось создание snack-a ");
        echo ($this->name) . PHP_EOL;
        echo ("Добавляется шоколад ");
        echo ($this->chocolate) . PHP_EOL;
        echo ("Добавлены начинок: ");
        foreach ($this->toppings as $value) {
            echo $value . '';
        }
        echo (".") . PHP_EOL;
    }
    public function cut(): void
    {
        echo "Нарезать в виде" . $this->shape;
    }
}
