<?php

//Static Properties and Methods
use App3\DB;
use App3\PaymentGateway\Paddle\Transaction; 

require __DIR__.'/../../vendor/autoload.php';

$transaction= new Transaction(25,'Transaction 1');
$transaction= new Transaction(25,'Transaction 1');
$transaction= new Transaction(25,'Transaction 1');
$transaction= new Transaction(25,'Transaction 1');

var_dump($transaction::$count1);//int(0)
var_dump(Transaction::$count1);//int(0)

/*
if we remove $transaction= new Transaction(25,'Transaction 1');
then var_dump(Transaction::$count1);//int(0) b/c defualt value
*/

var_dump(Transaction::$count);//int(4)
var_dump($transaction->c);//int(1)

var_dump(Transaction::getCount());//int(4)

$db=DB::getInstance([]);
$db=DB::getInstance([]);
$db=DB::getInstance([]);