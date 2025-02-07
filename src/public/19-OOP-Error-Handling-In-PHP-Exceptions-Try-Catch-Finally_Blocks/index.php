<?php
/*
Object-Oriented Programming (OOP) in PHP provides a robust way to handle errors using exceptions.
 Exceptions allow you to handle runtime errors gracefully without crashing your application.
 PHP uses the try, catch, and finally blocks to manage exceptions effectively.

Exceptions in PHP:
Key Methods of the Exception Class:
getMessage(): Returns the exception message.
getCode(): Returns the exception code.
getFile(): Returns the file where the exception was thrown.
getLine(): Returns the line number where the exception was thrown.
getTrace(): Returns a backtrace as an array.
getTraceAsString(): Returns a backtrace as a string.

*/

/*
Throwing Exceptions:
You can throw an exception using the throw keyword. This is typically done when an error condition is met.

*/
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("Division by zero is not allowed.");
    }
    return $numerator / $denominator;
}
//divide(10,0);
/*
Try-Catch Block:
The try block contains the code that might throw an exception. The catch block handles the exception if it occurs.
 */

 try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();//Caught exception: Division by zero is not allowed.
}

/*
 Multiple Catch Blocks
You can catch different types of exceptions by using multiple catch blocks. 
This is useful when you want to handle different exceptions differently.
*/
try {
    echo divide(10,0);
} catch (InvalidArgumentException $e) {
    echo "Invalid argument: " . $e->getMessage();
} catch (Exception $e) {
    echo "Generic exception: " . $e->getMessage();
}

/*
Finally Block
The finally block is optional and executes regardless of whether an exception was thrown or not. 
It is typically used for cleanup tasks, such as closing files or releasing resources.
*/

try {
    echo divide(10, 2);
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
} finally {
    echo " This will always execute.";
}
//5 This will always execute.

/*
Custom Exceptions
You can create custom exception classes by extending the Exception class. 
This allows you to define your own exception types with specific behaviors.
*/
 
class DivisionByZeroException extends Exception {
    public function __construct() {
        parent::__construct("Division by zero is not allowed.");
    }
}
 
function divide1($numerator, $denominator) {
    if ($denominator == 0) {
        throw new DivisionByZeroException();
    }
    return $numerator / $denominator;
}

try {
    echo divide1(10, 0);
} catch (DivisionByZeroException $e) {
    echo "Custom exception caught: " . $e->getMessage();
}

/*
Global Exception Handler
You can set a global exception handler to catch any uncaught exceptions in your application using set_exception_handler().


function globalExceptionHandler($e) {
    echo "Uncaught exception: " . $e->getMessage();
}

set_exception_handler('globalExceptionHandler');

throw new Exception("This is an uncaught exception.");
*/

/*
Best Practices for Exception Handling
Throw exceptions for exceptional conditions: Don’t use exceptions for normal control flow.

Catch specific exceptions: Avoid catching the generic Exception class unless necessary.

Use custom exceptions: Create custom exceptions for better error handling and readability.

Clean up resources in finally: Use the finally block to release resources like file handles or database connections.
*/

class DatabaseConnectionException extends Exception {}
class QueryExecutionException extends Exception {}

class Database {
    public function connect() {
        // Simulate a connection failure
        throw new DatabaseConnectionException("Could not connect to the database.");
    }

    public function query() {
        // Simulate a query failure
        throw new QueryExecutionException("Query execution failed.");
    }
}

try {
    $db = new Database();
    $db->connect();
    $db->query();
} catch (DatabaseConnectionException $e) {
    echo "Database connection error: " . $e->getMessage();
} catch (QueryExecutionException $e) {
    echo "Query execution error: " . $e->getMessage();
} finally {
    echo " Cleanup resources.";
}