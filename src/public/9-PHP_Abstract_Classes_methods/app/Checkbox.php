<?php

namespace App6;

class Checkbox extends Boolean
{  
    public function render():string
    {
        return '<input type="checkbox" name="'.$this->name.'"/>';
    }
}