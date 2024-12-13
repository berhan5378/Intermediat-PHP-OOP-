<?php

namespace App7;

class Rocky implements DebtCollector
{
    public function collect(float $owedAmount):float
    {
        return $owedAmount*0.65;
    }
}