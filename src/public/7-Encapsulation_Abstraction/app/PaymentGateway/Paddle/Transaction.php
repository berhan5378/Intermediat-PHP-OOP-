<?php

declare(strict_types = 1);

namespace App4\PaymentGateway\Paddle;

class Transaction
{
    private float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function copyForm(Transaction $transaction)
    {
        var_dump($transaction->amount,$transaction->sendEmail());// float(300) bool(true)
    }

    public function getAmount():float
    {
        return $this->amount;
    }

    public function setAmount(float $amount)
    {
        $this->amount=$amount;
    }
 
    public function process()
    {
        echo 'Processing $'.$this->amount. 'transaction';

        $this->generateReceipt();

        $this->sendEmail();
    } 
    
    private function generateReceipt()
    {
        
    }

    private function sendEmail()
    {
         return true;
    }
}