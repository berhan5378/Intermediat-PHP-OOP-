<?php

namespace App6;

class Text extends Field
{ 
    public function render():string
    {
        return '<input type="text" name="'.$this->name.'"/>';
    }
}