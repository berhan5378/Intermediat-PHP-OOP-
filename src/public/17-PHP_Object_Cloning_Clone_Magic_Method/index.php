<?php
/*
PHP - Object Cloning & Clone Magic Method
In PHP, object cloning involves creating a copy of an existing object. This is done using the clone keyword. 
The __clone() magic method can be defined within a class to customize the cloning behavior.

When an object is cloned using the clone keyword, PHP creates a 'shallow'(if we update the copy also affect original) copy of the object.
      -Any references in the original object remain as references in the cloned object
      -A shallow copy is a direct duplication of an object without duplicating its referenced objects
if we use Deep Copy (if we set on the class __clone() methode) isn't affect the orginal if we update the copy.
*/

class Person {
    private $id;

    public function __construct() {
        $this->id = uniqid("user_");
    }

    public function __clone() {
        // Optional custom behavior during cloning
        $this->id = uniqid("user_");
    }
}

$person1 = new Person();
$person2 = clone $person1;
 var_dump($person1,$person2);
/*
both id is d/f each other b/c we use __clone() to custom id(behavior) during cloning
class Person#1 (1) {
  private $id =>
  string(18) "user_67a47d9b43d0e"
}
 
class Person#2 (1) {
  private $id =>
  string(18) "user_67a47d9b43d23"
}
*/