<?php
/**Static Properties and Methods
 *Shared Across All Instances: Static properties are shared between all objects of the class. 
 *Changing the value of a static property affects all instances.
 *No Object Required: Static methods and properties can be used without creating an object of the class.
 *Accessing Static Members Within the Class: Use the self:: keyword to access static members from within the class.
 */

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