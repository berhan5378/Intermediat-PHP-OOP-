<?php
/*
PHP Iterators & Iterable Type
 iterators and the iterable type provide a way to traverse (iterate over) collections of data, such as arrays or objects. 
 Iterators are particularly useful when working with custom objects that need to be looped through, like database results or file lines

 he Iterator interface allows you to create custom iterators for objects. It requires implementing the following methods:

current(): Returns the current element.

key(): Returns the key of the current element.

next(): Moves forward to the next element.

rewind(): Rewinds the iterator to the first element.

valid(): Checks if the current position is valid.
*/
function printIterable(iterable $iterable) {
    foreach ($iterable as $item) {
        echo $item."\n";//456
        echo $iterable->current()."\n";//456
    } 
}

$iterator = new ArrayIterator([4, 5, 6]);
printIterable($iterator); // Works with iterators

//Custom Iterator
class MyIterator implements Iterator {
    private $data = [];
    private $position=0;

    public function __construct(array $data) {
        $this->data = $data;
        $this->position = 0;
    }

    public function rewind():void {
        $this->position = 0;// iterator to the first element
    }

    public function current():mixed {
        return $this->data[$this->position];
    }

    public function key():mixed {
        return $this->position;
    }

    public function next():void {
        $this->position++;
    }

    public function valid():bool {
        return isset($this->data[$this->position]);
    } 
}

$iterator = new MyIterator([10, 20, 30]);
print_r($iterator);
foreach ($iterator as $key => $value) {
    echo "$key: $value\n";
    echo $iterator->key().": ".$iterator->current()."\n";
}

/*
IteratorAggregate Interface
The IteratorAggregate interface is a simpler way to make an object iterable. 
It requires implementing a single method, getIterator(), which returns an iterator.
*/
class MyCollection implements IteratorAggregate {
    private $items = [];

    public function add($item) {
        $this->items[] = $item;
    }

    public function getIterator():Traversable {
        return new ArrayIterator($this->items);
    }
}

$collection = new MyCollection();
$collection->add("Apple");
$collection->add("Banana");
$collection->add("Cherry");

foreach ($collection as $item) {
    echo $item . "\n";
}

/*
Generators
Generators provide a simpler way to create iterators without implementing the Iterator interface. 
They use the yield keyword to produce values on the fly.
*/

function generateNumbers($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}

foreach (generateNumbers(1, 5) as $number) {
    echo $number . "\n";
}

/*
Iterating Over Objects
To make an object iterable, you can either:

Implement the Iterator interface.

Implement the IteratorAggregate interface.

Use a generator.
*/
class User {
    public $name = "John";
    public $age = 30;
    public $email = "john@example.com";
}
class UserCollection {
    public function __construct(public array $user)
    {
        
    }
    public function getIterator() {
        return new ArrayIterator($this->user);
    }
}

$UserCollection = new UserCollection([new User(),new User()]);
foreach ($UserCollection->getIterator() as $value) {
    print_r($value);
}
//Iterating Over a Directory
$directory = new FilesystemIterator(__DIR__);
foreach ($directory as $file) {
    echo $file->getFilename() . "\n";
}

/*
Practical Use Cases
Database Results: Iterate over rows returned from a database query.

File Processing: Iterate over lines in a file.

Custom Collections: Iterate over custom data structures (e.g., linked lists, trees).

Lazy Loading: Use generators to load data on demand.
*/