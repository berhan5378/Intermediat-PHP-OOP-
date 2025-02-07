<?php
/*
Late Static Binding (LSB) is a feature in PHP that allows a class to reference the called class in a context of static inheritance. 
Essentially, it lets you reference the class that was initially called at runtime, rather than the class in which the method or property is defined.

This is particularly useful in scenarios involving inheritance, where you want to ensure that static methods or properties refer to the class that was actually called, not necessarily the class where the method or property is defined.

How It Works
In PHP, when you use the self keyword inside a static method, it always refers to the class in which the method is defined.
However, when you use the static keyword, it refers to the class that was called at runtime. This is the essence of late static binding.


Late Static Binding is a powerful feature in PHP that allows for more flexible and dynamic code, especially in object-oriented programming with inheritance.
By using the static keyword, you can ensure that your static methods and 
properties refer to the called class at runtime, providing a way to implement polymorphic behavior in static contexts.
*/
class ClassA
{
    protected string $name = 'A';
    protected static string $name1 = 'A';
    
    public function getName():string
    {
        var_dump(get_class($this));
        return $this->name;
    }
    public static function getName1():string
    {
        var_dump((self::class));// or echo __CLASS__.PHP_EOL;
        return self::$name1;
    }
    public static function getName2():string
    {
        var_dump(get_called_class());
        return self::$name1;
    }

    public static function getName3():string
    { 
        var_dump((static::class));
        return static::$name1;
    }
    public static function make():static
    { 
        
        return new static();
    }
}

class ClassB extends ClassA
{
    protected string $name = 'B';
    protected static string $name1= 'B'; 
}

$classA= new ClassA();
$classB= new ClassB();

echo $classA->getName().PHP_EOL;
echo $classB->getName().PHP_EOL;
/*
string(6) "ClassA"
A
string(6) "ClassB"
B
*/
echo $classA::getName1().PHP_EOL;
echo $classB::getName1().PHP_EOL;
/*
string(6) "ClassA"   // this the limitation of 'self' keyword so self keyword dosen't follow the same ineritance rule.
A
string(6) "ClassA"
A
*/
echo $classA::getName2().PHP_EOL;
echo $classB::getName2().PHP_EOL;
/*
string(6) "ClassA" // the class name is correct but the value of property is not correct. this done by get_called_class()
A
string(6) "ClassB"
A
*/
echo $classA::getName3().PHP_EOL;
echo $classB::getName3().PHP_EOL;
/*
string(6) "ClassA"//this is the correct out put. done by "static" keyword . static keyword used to acces let static binding
A
string(6) "ClassB"
B
*/

var_dump($classA::make(),$classB::make());
 /*
 class ClassA#3 (1) {
  protected string $name =>
  string(1) "A"
}

class ClassA#3 (1) {
  protected string $name =>
  string(1) "A"
}
  */