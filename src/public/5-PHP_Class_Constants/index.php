<?php

/**
 * Class Constants:- are values that do not change and belong to the class, not instances.They are defined using the const keyword.
 */
use App2\PaymentGateway\Paddle\Transaction; 

require __DIR__.'/../../vendor/autoload.php';

$transaction= new Transaction();

echo $transaction::STATUS_PAID;//paid
echo $transaction::class;//App2\PaymentGateway\Paddle\Transaction

$transaction->setStatus($transaction::STATUS_PAID);
echo '<pre>'; 
print_r($transaction);
echo '<pre>';
/*
App2\PaymentGateway\Paddle\Transaction Object
(
    [status:App2\PaymentGateway\Paddle\Transaction:private] => paid
)
*/