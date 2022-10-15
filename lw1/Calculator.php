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
        return $this;
    }

    public function minus(float $deductible)
    {
        $this->calculatedAmount = $this->calculatedAmount - $deductible;
        return $this;
    }

    public function product(float $multiplier)
    {
        $this->calculatedAmount = $this->calculatedAmount * $multiplier;
        return $this;
    }

    public function division(float $divider)
    {
        if ($divider === 0) {
            $this->calculatedAmountq = 0;
            return $this;
        } else {
            $this->calculatedAmount = $this->calculatedAmount / $divider;
            return $this;
        }
    }

    public function getResult()
    {
        return $this->calculatedAmount;
    }
}

$calculator = new Calculator(0);

echo $calculator->sum(1.4)->sum(2.6)->product(4)->getResult();

