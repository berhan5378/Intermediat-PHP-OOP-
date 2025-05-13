<?php

namespace App7;

class CollectionAgency implements DebtCollector//we can implements more interface
{
    public function collect(float $owedAmount):float
    {
        $guaranteed =(int)$owedAmount*0.5;
        return \mt_rand($guaranteed,$owedAmount).\PHP_EOL;
    }
}