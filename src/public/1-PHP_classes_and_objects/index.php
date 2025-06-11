<?php

/**  classes & objects 
 * Classes :- A blueprint for creating objects. Defines properties (attributes) and methods (behaviors).
 * Objects :- Instances of a class that contain actual values for properties and can use class methods. 
*/

declare(strict_types = 1);

require_once 'class/Transaction.php';


/* //we can use new Transaction() without create __construct(float $amount, string $description), b/c to handel error of the arguments pass on new Transaction();
$transaction = new Transaction();

var_dump($transaction->amount);//NULL
var_dump($transaction->amount2);// error(Typed property Transaction::$amount2 must not be accessed before initialization )

$transaction->amount =15;
$transaction->amount1 =25;

var_dump($transaction->amount);//int(15)
var_dump($transaction->amount1);//float(25)

*/

$transaction = new Transaction(100,'transaction 1');

var_dump($transaction->amount);//float(100)

$transaction->addTax(8);
var_dump($transaction->amount);//float(108)

$transaction->applyDiscount(10);
var_dump($transaction->amount); //float(97.2)

//private method  like public method can't be access  directly out of the current class. instead we use this 
 
var_dump($transaction->getAmount());//float(50)

$transaction2 = (new Transaction(200,'transaction 2'))
        ->addTax2(8)
        ->applyDiscount2(15);


var_dump($transaction->amount,$transaction2->amount);


echo '<pre>';
var_dump($transaction,$transaction2);
echo '<pre>';

/*
  object(Transaction)#1 (4) {
  ["amount"]=>
  float(97.2)
  ["description"]=>
  string(13) "transaction 1"
  ["amount1"]=>
  float(20)
  ["amount2"]=>
  uninitialized(float)
  ["amount3":"Transaction":private]=>
  int(50)
}
object(Transaction)#2 (4) {
  ["amount"]=>
  float(183.6)
  ["description"]=>
  string(13) "transaction 2"
  ["amount1"]=>
  float(20)
  ["amount2"]=>
  uninitialized(float)
  ["amount3":"Transaction":private]=>
  int(50)
}
 */

 $string ='{"a":1,"b":2,"c":3}';
// to create array from string
$array =json_decode($string, true);

var_dump($array);
/*
array(3) {
  ["a"]=>
  int(1)
  ["b"]=>
  int(2)
  ["c"]=>
  int(3)
}
*/

// to create object from string
$object =json_decode($string);

var_dump($object);
/*
object(stdClass)#3 (3) {
  ["a"]=>
  int(1)
  ["b"]=>
  int(2)
  ["c"]=>
  int(3)
}
*/

// to create custom object
$object2 = new \stdClass();

$object2->aa =1;
$object2->bb =2;

var_dump($object2);
/*
object(stdClass)#4 (2) {
  ["aa"]=>
  int(1)
  ["bb"]=>
  int(2)
}
*/

//create object from array
$array2 =['b'=>1,2,3];
$object3 = (object) $array2;

var_dump($object3);
/*
object(stdClass)#5 (3) {
  ["b"]=>
  int(1)
  ["0"]=>
  int(2)
  ["1"]=>
  int(3)
}
*/
var_dump($object3->{1},$object3->b);//int(3)int(1)


$object4 = (object) 1; // if we set null instead of 1 the the object is empty 

var_dump($object4);
/*
object(stdClass)#6 (1) {
  ["scalar"]=>
  int(1)
}
*/
var_dump($object4->scalar);//int(1)
