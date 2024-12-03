<?php
 /** PHP abstract class and methods
  * An abstract class in PHP is a class that cannot be instantiated directly.
  * It serves as a blueprint for other classes. 
  * Abstract classes can Contain both abstract methods (without implementation) and regular methods (with implementation).
  * Abstract classes can Be partially implemented, requiring derived (child) classes to complete the implementation.
  *Benefits of Abstraction
  *Simplifies Complexity: Users interact with only the essential features of an object.
  *Enhances Flexibility: Helps in designing loosely coupled systems.
  *Encourages Code Reuse: Abstract classes and interfaces serve as blueprints for multiple implementations.
  *Supports Polymorphism: Allows different classes to be treated uniformly. 
  */
use App6\Checkbox; 
use App6\Radio;
use App6\Text;

require __DIR__.'/../../vendor/autoload.php';

$fields =[ 
    new Text('textField'), 
    new Checkbox('checkboxField'),
    new Radio('radioField'),
];

foreach($fields  as $field)
{
    echo $field->render().$field->name .'<br />';
}