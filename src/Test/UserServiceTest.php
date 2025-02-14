<?php
use PHPUnit\Framework\TestCase;
//i know the path isn't set here but setted on mathtest.php so i can test all with out spacify single file b/c both are on the same file
class UserServiceTest extends TestCase
{
    public function testGetUserName()
    {
        // Create a mock for UserRepository
        $userRepositoryMock = $this->createMock(UserRepository::class);

        // Set up the mock to return a specific value
        $userRepositoryMock->method('find')
            ->willReturn(['id' => 1, 'name' => 'John Doe']);

        // Inject the mock into UserService
        $userService = new UserService($userRepositoryMock);

        // Test the method
        $result = $userService->getUserName(1);
        $this->assertEquals('John Doe', $result);
    }
}