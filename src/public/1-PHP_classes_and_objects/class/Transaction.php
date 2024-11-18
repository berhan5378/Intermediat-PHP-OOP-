<?php

declare(strict_types = 1);

class Transaction
{
    public $amount;
    public $description;

    public float $amount1=20;
    public float $amount2; 

    private $amount3=50;

    public function __construct(float $amount, string $description) {
        $this->amount = $amount;
        $this->adescriptionge = $description;
    }

    public function addTax(float $rate)
    {
        $this->amount += ($this->amount * $rate) /100;
    }

    public function addTax2(float $rate):Transaction
    {
        $this->amount += ($this->amount * $rate) /100;
        return $this;
    }

    public function applyDiscount(float $rate)
    {
        $this->amount -= ($this->amount * $rate) /100;
    }

    public function applyDiscount2(float $rate):Transaction
    {
        $this->amount -= ($this->amount * $rate) /100;
        return $this;
    }

    public function getAmount():float
    {
       return $this->amount3;
    }
 
}