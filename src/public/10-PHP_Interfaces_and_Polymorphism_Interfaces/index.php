<?php
/**
 * PHP Interfaces:-
 * All methods in an interface are public and abstract by default.
 * A class can implement multiple interfaces.
 * You cannot define properties or method bodies in an interface
 * 
 * Polymorphism with Interfaces:-
 * Polymorphism allows you to write flexible and reusable code by interacting with objects through a common interface.
 * When multiple classes implement the same interface, you can treat them interchangeably
 */
use App7\CollectionAgency;
use App7\DebtCollectionService;
use App7\Rocky;

require __DIR__.'/../../vendor/autoload.php';

$service = new DebtCollectionService();

echo $service->collectDebt(new CollectionAgency());
echo $service->collectDebt2(new Rocky());