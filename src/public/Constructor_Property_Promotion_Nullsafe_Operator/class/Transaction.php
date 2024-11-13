<?php

declare(strict_types = 1);

class Transaction
{
    private float $amount; 
    public ?Customer $customer=null;
    private ?Customer $customer2=null;
    
    public function __construct( float $amount, private string $description)
    {
       echo $this->amount = $amount;
       echo $this->description=$description;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer2;
    }

    
 
}