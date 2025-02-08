<?php

namespace App\Models;

use PDO;

class TaskModel {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllTasks() {
        $stmt = $this->db->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
