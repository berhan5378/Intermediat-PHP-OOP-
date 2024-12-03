<?php
/**if we use final class/method (final class Toaster/final public function toast()) we can't inherit on other class */

namespace App5;

class Toaster
{
    public const STATUS='pending';
    protected array $slices =[];
    protected int $size=2;

    protected array $slices1;
    protected int $size1;

    public function __construct()
    {
        $this->slices1=[];
        $this->size1=2;
    }

    public function addSlice(string $slice): void
    {
        if(count($this->slices)< $this->size)
        {
            $this->slices[]=$slice; 
        }
    }

    public function addSlice1(string $slice1): void
    {
        if(count($this->slices1)< $this->size1)
        { 
            $this->slices1[]=$slice1;
        }
    }

    public function toast()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1).': Toasting '.$slice . \PHP_EOL;
        }
    }

    public function override(string $read)
    {
        echo 'read from: '. $read;
    }

}