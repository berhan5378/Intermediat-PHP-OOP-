<?php

declare(strict_types = 1);

class Transaction
{
    public ?Customer $customer=null;
    private ?Customer $customer2=null;
    /* Constructor Property Promotion:- Define and initialize properties directly in the constructor's parameter list*/
    public function __construct( private float $amount, private string $description)
    {
       echo $this->amount = $amount;
       echo $this->description=$description;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer2;
    }

    
 
}