<?php

/** PHP Coding Standards, Autoloading(PSR-4) and Composer */
//Autoloading is solve the 'require file'

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
 