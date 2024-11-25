<?php

declare(strict_types = 1);

namespace App3\PaymentGateway\Paddle;

class Transaction
{
    public static int $count=0;
    public static int $count1=0;
    private static int $count2=0;
    public int $c=0;

    public function __construct(
        public float $amount,
        public string $description
    )
    {
        self::$count++;
        self::$count2++;
        $this->c++;
    }

    public static function getCount():int
    {
        return self::$count2;
    }
}