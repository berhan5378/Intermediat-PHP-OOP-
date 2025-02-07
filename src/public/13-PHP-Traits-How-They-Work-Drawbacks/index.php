<?php

/*
PHP Traits - How They Work & Drawbacks
Traits in PHP are a mechanism for code reuse in single inheritance languages like PHP.
They allow you to reuse methods in multiple classes without needing to use inheritance. 
Traits are essentially a set of methods that can be included within classes, providing a way to share functionality across different classes.

A trait is defined using the 'trait' keyword
A class can use a trait with the 'use' keyword
Multiple Traits: A class can use multiple traits.
Conflict Resolution: If two traits have methods with the same name, you can resolve the conflict using the 'insteadof' and 'as' operators.
*/

trait Loggable {
    public function log($message) {
        echo "Log: $message\n";
    }
    private function private() {
        echo "calling private outside the class\n";
    }
}

trait Notifiable {
    public function notify($message) {
        echo "Notification: $message\n";
    }
}

class User {
    use Loggable;

    public function createUser($name) {
        // User creation logic
        $this->log("User $name created.");
    }
}

class Product {
    use Loggable {
        Loggable::private as public;//to acces this we can use itself private() or public() if we used 'as' keyword
    }

    public function createProduct($name) {
        // Product creation logic
        $this->log("Product $name created.");
    }
}

class Order {
    use Loggable, Notifiable;

    public function createOrder($id) {
        // Order creation logic
        $this->log("Order $id created.");
        $this->notify("Order $id created.");
    }
}

(new Order())->createOrder(1);//Log: Order 1 created.
                             //Notification: Order 1 created.
(new User())->createUser('barry');//Log: User barry created.
(new Product())->createProduct('bag');//Log: Product bag created.

//Conflict Resolution: If two traits have methods with the same name, you can resolve the conflict using the insteadof and as operators.
trait A {
    public function smallTalk() {
        echo 'a';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::smallTalk as aSmallTalk;
    }
}

$talker = new Talker();
$talker->smallTalk(); // Outputs: b
$talker->aSmallTalk(); // Outputs: a

(new Product())->private();//calling private outside the class


/*
Drawbacks of Traits
Name Conflicts: If multiple traits or a trait and a class have methods with the same name, it can lead to conflicts that need to be resolved manually.

Complexity: Overuse of traits can make the codebase harder to understand and maintain, as the flow of execution becomes less clear.

Testing: Traits can make unit testing more difficult because they introduce additional dependencies and side effects.

Inheritance Issues: Traits do not solve the diamond problem (multiple inheritance issue) completely. If two traits used by a class have methods with the same name, it can still cause conflicts.

Encapsulation: Traits can break encapsulation by exposing methods that are not meant to be part of the public API of a class.

Best Practices
Use Sparingly: Use traits for small, reusable pieces of functionality that do not fit well into a class hierarchy.

Avoid State: Traits should generally avoid having properties to prevent unexpected behavior and conflicts.

Clear Naming: Use clear and descriptive names for trait methods to avoid conflicts and improve readability.

Documentation: Clearly document the purpose and usage of traits to aid in maintenance and understanding.
*/