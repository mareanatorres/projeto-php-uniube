<?php

class TaskDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create(int $userId, string $title, ?string $description = null, ?string $event_date = null, ?string $location = null) {
        $sql = "INSERT INTO tasks (user_id, title, description, event_date, location) VALUES (:user_id, :title, :description, :event_date, :location)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':title' => $title,
            ':description' => $description,
            ':event_date' => $event_date,
            ':location' => $location
        ]);
        return $this->conn->lastInsertId();
    }

    public function forUser(int $userId) {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id) {
        $sql = "SELECT * FROM tasks WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $title, ?string $description = null, ?string $event_date = null, ?string $location = null) {
        $sql = "UPDATE tasks SET title = :title, description = :description, event_date = :event_date, location = :location WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':title' => $title, ':description' => $description, ':event_date' => $event_date, ':location' => $location, ':id' => $id]);
    }

    public function delete(int $id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
