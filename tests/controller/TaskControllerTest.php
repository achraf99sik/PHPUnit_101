<?php

use PHPUnit\Framework\TestCase;
use App\controllers\TaskController;
use App\Models\TaskModel;

class TaskControllerTest extends TestCase {
    public function testIndex() {
        // Mock TaskModel
        $mockTaskModel = $this->createMock(TaskModel::class);
        
        // Mock the behavior of getAllTasks() method
        $mockTaskModel->method('getAllTasks')->willReturn([
            ["id" => 1, "title" => "Test Task 1"],
            ["id" => 2, "title" => "Test Task 2"]
        ]);

        // Create TaskController instance with mocked TaskModel
        $taskController = new TaskController($mockTaskModel);

        // Test the index method
        $tasks = $taskController->index();

        // Assert that the returned tasks are as expected
        $this->assertIsArray($tasks);
        $this->assertCount(2, $tasks);
        $this->assertEquals("Test Task 1", $tasks[0]['title']);
    }
}
