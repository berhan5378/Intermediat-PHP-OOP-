<?php
/*
PHP Anonymous Classes
Anonymous classes in PHP are classes that are defined and instantiated on the fly, without a formal class name. 
They are useful for creating simple, one-off objects without the need to define a full class in your codebase. 
Anonymous classes are particularly handy for implementing interfaces or extending classes in a concise manner.

Syntax:
Anonymous classes are defined using the 'new class' syntax. 
They can have properties, methods, and even implement interfaces or extend other classes
Anonymous classes can accept arguments in their constructor.
Anonymous classes can also use traits.
*/
$object = new class {
    public function sayHello() {
        return "Hello from an anonymous class!";
    }
};
var_dump($object);
/*
class class@anonymous#1 (0) {
}
*/
echo $object->sayHello(); // Output: Hello from an anonymous class!

interface Logger {
    public function log($message);
}

$logger = new class implements Logger {
    public function log($message) {
        echo "Log: $message\n";
    }
};
var_dump($logger);
/*
class Logger@anonymous#2 (0) {
}
*/
$logger->log("This is a log message."); // Output: Log: This is a log message.

//Passing Arguments to the Constructor:
//Anonymous classes can accept arguments in their constructor.

$printer = new class("Anonymous Class") {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
};

echo $printer->getName(); // Output: Anonymous Class

trait Loggable {
    public function log($message) {
        echo "Log: $message\n";
    }
}

$logger = new class {
    use Loggable;
};

$logger->log("This is a log message."); // Output: Log: This is a log message.


/*
Use Cases for Anonymous Classes
Quick Implementations:
When you need a simple implementation of an interface or a class for a specific task, anonymous classes can save you from defining a full class.

Testing:
Anonymous classes are useful in unit tests for creating mock objects or stubs on the fly.

Closures with State:
If you need a closure-like object but with additional state or methods, anonymous classes can be a good alternative.

Dependency Injection:
In some cases, anonymous classes can be used to inject dependencies or override behavior in a specific context.

Drawbacks of Anonymous Classes
Readability:
Overusing anonymous classes can make the code harder to read and maintain, especially if the logic inside the anonymous class is complex.

Reusability:
Since anonymous classes are defined inline, they cannot be reused elsewhere in the codebase. This can lead to code duplication if similar logic is needed in multiple places.

Debugging:
Anonymous classes do not have a name, which can make debugging more challenging. Stack traces will refer to the class as class@anonymous, making it harder to identify the source of issues.

Testing:
Anonymous classes cannot be easily mocked or tested in isolation, as they are not defined as standalone classes.
*/