<?php
// tests/MathTest.php
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../public/32-PHP-Unit-Testing-PHPUnit-Tutorial/index.php';

class MathTest extends TestCase
{
    public function testAdd()
    {
        $math = new Math();
        $result = $math->add(2, 3);

        $this->assertEquals(5, $result);
    }

    public function testAssertions()
    {
        $this->assertEquals(4, 2 + 2); // Passes
        $this->assertTrue(1 === 1);    // Passes
        $this->assertFalse(1 === 2);   // Passes
        $this->assertNull(null);       // Passes
        $this->assertSame(10, 10);     // Passes (type and value match)
    }

    /*
    Testing Exceptions
You can test if your code throws the expected exceptions using the expectException method.
*/
    public function testDivideByZero()
    {
        $math = new Math();
    
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Division by zero is not allowed.");
    
        $math->divide(10, 0);
    }

    /*
    Data Providers
Data providers allow you to run the same test with multiple sets of data. This is useful for testing edge cases.
*/

    /**
     * @dataProvider additionProvider
     */
    public function testAddWithDataProvider($a, $b, $expected)
    {
        $math = new Math();
        $result = $math->add($a, $b);
        $this->assertEquals($expected, $result);
    }
    
    public function additionProvider()
    {
        return [
            [2, 3, 5],
            [0, 0, 0],
            [-1, 1, 0],
            [10, -5, 5],
        ];
    }

}