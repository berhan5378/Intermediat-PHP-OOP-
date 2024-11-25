<?php
/**Encapsulation is one of the core principles of object-oriented programming (OOP) in PHP
 * Benefits of Encapsulation:-
 * Data Protection: Prevents direct access to sensitive data.
 * Controlled Access: You can define rules for accessing or modifying properties using methods.
 * Flexibility and Maintenance: Makes the code easier to update since internal implementation can change without affecting the external interface.
 * Improves Code Readability: Clear separation of responsibilities within a class
 * 
 * Abstraction is another core concept of Object-Oriented Programming (OOP) in PHP. It focuses on hiding the implementation details of a system and exposing only the relevant functionalities to the user. 
 * more detial about abstract class and method you can see on public folder
 */
use App4\PaymentGateway\Paddle\Transaction; 
 
require __DIR__.'/../../vendor/autoload.php';

$transaction = new Transaction(25);

$transaction->setAmount(125);

$transaction->process();

//ReflectionProperty() is allow  directly to access/modify private/protected property like public property
$reflectionProperty = new ReflectionProperty(Transaction::class,'amount');
$reflectionProperty->setAccessible(true);

$reflectionProperty->setValue($transaction,200);

var_dump($reflectionProperty->getValue($transaction));//float(200)

$transaction->copyForm(new Transaction(300));
  