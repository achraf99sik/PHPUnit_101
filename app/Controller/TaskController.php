<?php

namespace App\controllers;

use App\Model\TaskModel;

class TaskController {
    private TaskModel $taskModel;

    public function __construct(TaskModel $taskModel) {
        $this->taskModel = $taskModel;
    }

    public function index() {
        return $this->taskModel->getAllTasks();
    }
}
