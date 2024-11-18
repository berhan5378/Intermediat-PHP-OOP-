<?php

/** PHP Coding Standards, Autoloading(PSR-4) and Composer */
/*
PHP Coding Standards is Ensures consistent code style and readability
Key Standards:
PSR-1: Basic coding standard (e.g., file encoding, class naming).
PSR-12: Extended coding style guide (indentation, braces, etc.).

Autoloading (PSR-4):- Automatically loads classes without manually including files

Composer:- Dependency management for PHP projects.
Uses:
Automatically installs and updates libraries and packages.
Manages autoloading configurations (including PSR-4).

*/

/*
 spl_autoload_register(
    function ($class)
    {
        var_dump($class);//string(37) "App\PaymentGateway\Paddle\Transaction"
        $path = __DIR__.'/'.lcfirst(str_replace('\\','/',$class).'.php');
        var_dump($path);//string(107) "/var/www/public/4-PHP_CodingStandards_Autoloading(PSR-4)_Composer/app/PaymentGateway/Paddle/Transaction.php";
        if(file_exists($path))
        {
            require $path;
        }
    }
);
*/
require __DIR__.'/../../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction; 

$id= new \Ramsey\Uuid\UuidFactory();
echo $id->uuid4();
$paddleTransaction =new Transaction();
var_dump($paddleTransaction);
 