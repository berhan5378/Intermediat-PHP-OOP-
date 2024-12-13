<?php

namespace App7;

interface DebtCollector extends AnotherInterface, SomeOtherInterface //we can extends more interface 
{
    public function collect(float $owedAmount):float;
    public const STATUS='paid'; //this const can't override by child class. which means  we can't  set this cost property on child class
}