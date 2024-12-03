<?php

namespace App6;

class Radio extends Boolean
{ 
    public function render():string
    {
        return '<input type="radio" name="'.$this->name.'"/>';
    }
}