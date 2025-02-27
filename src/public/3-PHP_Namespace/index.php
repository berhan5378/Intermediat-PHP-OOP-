<?php

/** PHP Namespace 
 * PHP Namespaces:- Avoid name conflicts between classes, functions, or constants in different parts of a project.
*/
//for e.g it's resolve the confilict b/n the Stripe class of Transaction() and  Paddle class of Transaction()

require_once 'PaymentGateway/Stripe/Transaction.php';
require_once 'PaymentGateway/Paddle/Transaction.php';
require_once 'PaymentGateway/Paddle/CustomerProfile.php';
require_once 'Notification/Email.php';

use PaymentGateway\Paddle\{Transaction,CustomerProfile};
use PaymentGateway\Stripe\Transaction as StripeTransaction; //we use 'as' to resolve the confilict of the same 'Transaction'
use PaymentGateway\Paddle;

var_dump(new Transaction(),new PaymentGateway\Stripe\Transaction()); // if we don't use 'use' for Stripe
//or
var_dump(new CustomerProfile(),new Transaction(),new StripeTransaction());//if we use 'use' for stripe
//or
var_dump(new Paddle\CustomerProfile(),new Paddle\Transaction(),new StripeTransaction());//if we use 'use' for stripe
 