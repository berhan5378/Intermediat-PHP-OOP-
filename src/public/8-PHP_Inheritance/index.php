<?php
/**PHP Inheritance
 * Inheritance is an Object-Oriented Programming (OOP) feature that allows a class (called the child class or subclass) to inherit properties and methods from another class (called the parent class or base class).
 *  which means A child class can access public and protected members of the parent class.
 *              A child class can override properties(even const properties)/methods from the parent class (method overriding).
 *              A child class can add its own properties and methods.
 * Inheritance is not always good and can sometimes cause problems:
 *        Tight Coupling: Changes in the parent class can unintentionally break the child class
 *        Overriding Risks: Child classes can override methods, leading to unpredictable behavior if not done carefully
 *        Lack of Flexibility
 *        Overuse Can Lead to Fragility
 *        Violates SRP (Single Responsibility Principle): A parent class often tries to do too much to accommodate different child classes, leading to bloated and complex code.
 */
use App5\FancyOven;
use App5\Toaster;
use App5\ToasterPro;

require __DIR__.'/../../vendor/autoload.php';

$toaster = new ToasterPro();
echo $toaster::STATUS;//paid 
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice1('bread');
$toaster->addSlice1('bread');
$toaster->addSlice1('bread');
$toaster->addSlice1('bread');
$toaster->addSlice1('bread');
$toaster->addSlice1('bread');
$toaster->toastBagel();
$toaster->toastBagel2();
$toaster->override(readx:'ToasterPro');

//compostion instead of inheritance
$FancyOven= new FancyOven($toaster);

$FancyOven->toast();