<?php
//this class is use compostion instead of inheritance
namespace App5;

class FancyOven
{ 
    public function __construct(private ToasterPro $toaster)
    {
       
    }

    public function fry()
    {

    }

    public function toast()
    {
        $this->toaster->toast();
    }

    public function toastBagel()
    {
        $this->toaster->toastBagel2();
    }
}
