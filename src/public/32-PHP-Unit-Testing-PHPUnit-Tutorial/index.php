<?php
/*
PHP Unit Testing - PHPUnit Tutorial 
PHPUnit is a testing framework for PHP that allows you to write and run unit tests. It provides tools for:
Writing test cases.
Asserting expected outcomes.
Running tests and generating reports.


PHPUnit provides many assertion methods to validate your code. Here are some commonly used ones:
 
assertEquals($expected, $actual)	Checks if two values are equal.
assertTrue($condition)	Checks if a condition is true.
assertFalse($condition)	Checks if a condition is false.
assertNull($value)	Checks if a value is null.
assertNotNull($value)	Checks if a value is not null.
assertSame($expected, $actual)	Checks if two values are identical (type and value).
assertCount($expectedCount, $array)	Checks if an array has the expected number of items.


Best Practices
Test One Thing at a Time: Each test should focus on a single behavior or functionality.

Use Descriptive Test Names: Test method names should clearly describe what they are testing (e.g., testAddWithPositiveNumbers).

Keep Tests Independent: Tests should not depend on each other or on a specific execution order.

Use Mocks for Dependencies: Use mocking frameworks (e.g., PHPUnit's built-in mocking tools) to isolate the unit under test.

Run Tests Frequently: Run your tests often to catch regressions early.
*/
class Math
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function divide($a, $b)
    {
        if ($b === 0) {
            throw new InvalidArgumentException("Division by zero is not allowed.");
        }
        return $a / $b;
    }
}

//Mocking Dependencies

class UserRepository {
    public function find(int $userId){

    }
}
class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserName($userId)
    {
        $user = $this->userRepository->find($userId);
        return $user['name'];
    }
}