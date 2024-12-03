<?php

namespace App5;

class ToasterPro extends Toaster
{
    public const STATUS='paid';
    protected int $size =4;

    public function __construct()
    {
        parent::__construct(); //if we call construct method of Toaster after resize property then we get the normal size
        // the reason of calling construct method is slice1 b/c we can't call it before initialization so we get error on addSlice1() method
        //which means if we use only over read (with out call construct) we get  an error of slice1 b/c slice1 is not initialization on this construct or on toaster class exept on construct method )
        $this->size1=4;
    }

    public function toastBagel()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1).': Toasting '.$slice.'withbagel option' . \PHP_EOL;
        }
    }

    public function toastBagel2()
    {
        foreach ($this->slices1 as $i => $slice) {
            echo ($i + 1).': Toasting '.$slice.'withbagel option__1' . \PHP_EOL;
        }
    }

    public function override(string $readx)
    {
        echo 'ToasterPro'. \PHP_EOL;//if we set prameter like this($toaster->override(readx:'ToasterPro');) then we can't change the parameter of override method to readx instead of read
        //by the way on over read method/property of Toaster class we can't set d/f type of variable except construct method
        parent::override($readx);
    }
}
