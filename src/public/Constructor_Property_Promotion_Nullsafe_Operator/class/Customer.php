<?php

class Customer
{
    public ?PaymentProfile $paymentProfile=null;
    private ?PaymentProfile $paymentProfile2=null;

    public function getPaymentProfile(): ?PaymentProfile
    {
        return $this->paymentProfile2;
    }
}