<?php

declare(strict_types = 1);

require_once 'class/Transaction.php';
require_once 'class/Customer.php';
require_once 'class/PaymentProfile.php';

/*Constructor Property Promotion Nullsafe Operator*/

$transaction = new Transaction(5,'Test');


//echo $transaction->customer->paymentProfile->id;//Warning: Attempt to read property "paymentProfile" and "id" on null
echo $transaction->customer?->paymentProfile->id;//no error 
echo $transaction->customer->paymentProfile->id ?? 'foo';//foo

$transaction->customer= new Customer();

//echo $transaction->customer->paymentProfile->id;//Warning: Attempt to read property "id" on null
echo $transaction->customer->paymentProfile?->id;//no error

//echo $transaction->getCustomer()->getPaymentProfile()->id ?? 'bar';//Fatal error: Uncaught Error: Call to a member function getPaymentProfile() on null
echo $transaction->getCustomer()?->getPaymentProfile()?->id ?? 'bar';//bar
 
