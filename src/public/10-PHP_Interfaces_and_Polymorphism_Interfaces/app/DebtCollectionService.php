<?php

namespace App7;

class DebtCollectionService
{
    public function collectDebt(CollectionAgency $collector)
    {
        $owedAmount =\mt_rand(100,1000);
        $collectedAmount = $collector->collect($owedAmount);

        echo 'Collected $'.$collectedAmount.' out of $'.$owedAmount. \PHP_EOL;
    }

    public function collectDebt2(DebtCollector $collector) // this is Polymorphism Interfaces(which means we can access methods of class(which implements this(DebtCollector) interface))
    {
        \var_dump($collector instanceof Rocky); // the out put of this is boolean(if collectDebt2(new Rocky(); then the boolean =true)
        $owedAmount =\mt_rand(100,1000);
        $collectedAmount = $collector->collect($owedAmount);

        echo 'Collected $'.$collectedAmount.' out of $'.$owedAmount. \PHP_EOL;
        echo $collector::STATUS;
    }
}