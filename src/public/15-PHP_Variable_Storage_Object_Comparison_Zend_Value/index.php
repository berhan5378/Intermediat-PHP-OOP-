<?php
/*
PHP Variable Storage & Object Comparison - Zend Value (zval)
PHP uses a structure called zval (Zend Value) to store and manage variables internally.  
A zval is a C structure used by the Zend Engine (PHP's core) to represent variables in PHP.
It contains information about the variable's type, value, and reference count.

A zval typically consists of the following components:

Value: The actual data stored in the variable (e.g., an integer, string, object, etc.).

Type: The data type of the variable (e.g., IS_LONG, IS_STRING, IS_OBJECT, etc.).

Reference Count: Tracks how many symbols (variables, arrays, etc.) point to this zval. This is used for memory management and garbage collection.

Is Ref: A flag indicating whether the variable is a reference (&).

Type Info: Additional metadata about the type.




Integers, floats, booleans, and strings are stored directly in the zval.
Arrays and objects are stored as pointers to separate structures (e.g., HashTable for arrays, zend_object for objects).


Object Comparison in PHP

Loose Comparison (==):
        .Compares the properties and values of two objects.
        
        .Two objects are considered equal if they:
        
                -Are instances of the same class.
                
                -Have the same properties and values (regardless of order).

Strict Comparison (===):
Compares whether two variables reference the same instance of an object.

*/

$a = 42; // zval stores type=IS_LONG, value=42
$b = "Hello"; // zval stores type=IS_STRING, value="Hello"

$arr = [1, 2, 3]; // zval stores type=IS_ARRAY, value=pointer to HashTable
$obj = new stdClass(); // zval stores type=IS_OBJECT, value=pointer to zend_object

//References:
//When a variable is assigned by reference (&), the zval's is_ref flag is set to 1, and the reference count is incremented.
$a = 42;
$b = &$a; // Both $a and $b point to the same zval, is_ref=1

//PHP uses copy-on-write to optimize memory usage. When a variable is copied, the zval is shared until one of the copies is modified.
$a = [1, 2, 3];
$b = $a; // $a and $b share the same zval
$b[] = 4; // A new zval is created for $b due to modification

class User {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}

$user1 = new User("Alice");
$user2 = new User("Alice");
$user3 = $user1;
//if we update $user3 also affect $user1
var_dump($user1 == $user2);  // true (same properties and values)
var_dump($user1 === $user2); // false (different instances)
var_dump($user1 === $user3); // true (same instance)