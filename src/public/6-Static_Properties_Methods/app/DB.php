<?php

namespace App3;

class DB
{
    public static ?DB $instance = null;

    private function __construct (public array $config)
    {
        echo 'Instance Created<br />';//print only onetimes
    }
    /*
    public function __construct (public array $config)
    {
        echo 'Instance Created<br />';//print many times  b/c the __construct direact print 'Instance Created<br />';  with out getInstance() function
    }
    */

    public static function getInstance (array $config):DB
    {
        if(self::$instance===null)
        {
            self::$instance=new DB($config);
        }

        return self::$instance;
    }
}