<?php

namespace App6;

abstract class Field
{
    public function __construct(public string $name)
    {
        $this->name=$name;
    }

    abstract public function render():string; 
}