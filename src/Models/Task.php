<?php
require_once __DIR__ . '/../../config/database.php';

class Task {
    private $db;

    public function __construct() {
        $this->db = getDatabaseConnection();
    }

    public function getAllTasks() {
        $stmt = $this->db->query("SELECT * FROM tasks");
        return $stmt->fetchAll();
    }

    public function getTaskById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createTask($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
        $stmt->execute([$title, $description]);
    }

    public function updateTask($id, $title, $description) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $id]);
    }

    public function deleteTask($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
