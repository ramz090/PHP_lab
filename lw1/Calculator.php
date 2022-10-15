<?php

class Calculator
{
    private float $calculatedAmount;

    public function __construct(float $calculatedAmount)
    {
        $this->calculatedAmount = $calculatedAmount;
    }

    public function sum(float $summand)
    {
        $this->calculatedAmount = $this->calculatedAmount +  $summand;
    }

    public function minus(float $deductible)
    {
        $this->calculatedAmount = $this->calculatedAmount - $deductible;
    }

    public function product(float $multiplier)
    {
        $this->calculatedAmount = $this->calculatedAmount * $multiplier;
    }

    public function division(float $divider)
    {
        if ($divider === 0) {
            $this->calculatedAmountq = 0;
        } else {
            $this->calculatedAmount = $this->calculatedAmount / $divider;
        }
    }

    public function getResult()
    {
        return $this->calculatedAmount;
    }
}

$calculator = new Calculator(0);

$calculator->sum(1.4);
$calculator->sum(2.6);
$calculator->product(4);
$calculator->division(3);
echo $calculator->getResult();
