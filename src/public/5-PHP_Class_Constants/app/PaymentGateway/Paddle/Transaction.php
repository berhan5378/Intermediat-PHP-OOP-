<?php

declare(strict_types = 1);

namespace App2\PaymentGateway\Paddle;

class Transaction
{
    public const STATUS_PAID = 'paid';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DECLINED = 'declined';
    private const STATUS_PAID2 = 'paid';

    public const ALL_STATUSES = [
        self::STATUS_PAID     => 'Paid',// key = paid and value of this key is 'Paid'
        self::STATUS_PENDING  => 'Pending',
        self::STATUS_DECLINED => 'Declined',
    ];

    private string $status;

    public function __construct()
    {
        var_dump(Transaction::STATUS_PAID2);//string(4) "paid" 
        //or
        var_dump(self::STATUS_PAID2);//string(4) "paid" 
        //or
        var_dump($this::STATUS_PAID2);//string(4) "paid" 

        $this->setStatus(self::STATUS_PENDING);
    }

    public function setStatus(string $status):self
    {
        if(!isset(self::ALL_STATUSES[$status]))
        {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status=$status;

        return $this;
    }
}