<?php
/*
PHP Serialize Objects & Serialize Magic Methods 
 object serialization is the process of converting an object into a storable format, such as a string, so that it can be saved to a file, sent over a network, or stored in a database. 
 The reverse process is called deserialization, where the serialized string is converted back into the original object.


 __sleep() or __serialize()(the d/f is if we use __serialize() then serialize() is Called __serialize() rather than __sleep())
Called when serialize() is executed.
Used to specify which properties should be serialized.
Often used to perform cleanup tasks before serialization.

__wakeup() or __unserialize() (the d/f is if we use __unserialize() then unserialize() is Called __unserialize() rather than __wakeup())
Called automatically when unserialize() is executed.
Used to reinitialize properties or resources that were not serialized.

if we dont use magic methods then serialize() is  serialized  all property
*/

class User {
    public $name;
    public $card;

    public function __construct($name, $card) {
        $this->name = $name;
        $this->card = $card;
    }
    public function __sleep() { 

        return ['card'=>base64_encode($this->card)]; // Only serialize the 'card' property
    }

    public function __wakeup() { 
        echo "card reinitialized\n";
    }
    public function __serialize(): array
    {
        return ['name'=>$this->name,'card'=>base64_encode($this->card)];
        
    }
    public function __unserialize(array $data): void
    {
        var_dump($data);
    }
}

$user = new User("Alice", "123456789");

$serializedData = serialize($user);
echo $serializedData; 

$unserializedUser = unserialize($serializedData);
echo $unserializedUser->name; 
