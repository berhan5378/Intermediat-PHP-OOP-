<?php
/*
PHP PDO Tutorial Part 1: Prepared Statements and SQL Injection Prevention
PDO (PHP Data Objects) is a database access layer providing a uniform method of access to multiple databases. 
It allows you to switch between different databases (e.g., MySQL, PostgreSQL, SQLite) without changing your PHP code.

Why Use Prepared Statements?
Prepared statements are a feature of PDO that help you execute SQL queries safely and efficiently. They:
Prevent SQL Injection: By separating SQL code from user input, prepared statements ensure that malicious input cannot alter the structure of your SQL query.
Improve Performance: When executing the same query multiple times with different parameters, prepared statements can be more efficient because the database only needs to parse and compile the query once.



Use the prepare() method to create a prepared statement.
Bind the user input to the placeholders using the bindParam() or bindValue() method. Alternatively, you can pass the parameters directly when executing the statement
Execute the prepared statement using the execute() method.
etch the results using methods like fetch() or fetchAll()

full example on HomeController class
*/
require_once 'Controllers/HomeController.php';
require_once 'Controllers/InvoiceController.php';
require_once 'Controllers/Router.php';
require_once 'View.php';
define('VIEW_PATH',__DIR__.'/views');
try{
    $router= new Router();

$router
    ->register('/',[HomeController::class, 'index'])
    ->register('/invoices',[InvoiceController::class, 'index'])
    ->register('/invoices/create',[InvoiceController::class, 'create']);
echo $router->resolve($_SERVER['REQUEST_URI']);
}catch(RouteNotFoundException $e){
   // header('HTTP/1.1 404 Not Found');
    http_response_code(404);
    echo $e->getMessage();
}
