<?php

declare(strict_types = 1);

namespace PaymentGateway\Paddle;

use DateTime; 
use Notification\Email;

class Transaction
{
    public function __construct()
    {
        var_dump(new CustomerProfile());
        //var_dump(new DateTime());//error b/n DateTime() is not found
        var_dump(new \DateTime()); // it's work properly b/c it's load from global namespace not local the reason of '/' ( we use fullyqualified name if we were not use 'use' )
        var_dump(new DateTime());//it's work properly b/c we used 'use DateTime;'
        var_dump(new \Notification\Email());//it's work b/c we use fully qualified name by set this('\') on fornt of it
        var_dump(new Email());//it's work b/c we used 'use Notification\Email;'
    }
}