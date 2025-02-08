<?php

use PHPUnit\Framework\TestCase;
use App\Model\TaskModel;  // Use the correct namespace
use PDO;
use PDOStatement;

class TaskModelTest extends TestCase {
    public function testGetAllTasks() {
        // Mock the PDO database connection
        $mockPDO = $this->createMock(PDO::class);

        // Mock the PDOStatement
        $mockStatement = $this->createMock(PDOStatement::class);
        $mockStatement->method('fetchAll')->willReturn([
            ["id" => 1, "title" => "Test Task 1"],
            ["id" => 2, "title" => "Test Task 2"]
        ]);
        
        // Configure PDO to return the mock statement when query is called
        $mockPDO->method('query')->willReturn($mockStatement);

        // Create TaskModel instance with mocked PDO
        $taskModel = new TaskModel($mockPDO);

        // Test the getAllTasks method
        $tasks = $taskModel->getAllTasks();

        // Assert that the returned tasks are as expected
        $this->assertIsArray($tasks);
        $this->assertCount(2, $tasks);
        $this->assertEquals("Test Task 1", $tasks[0]['title']);
    }
}
