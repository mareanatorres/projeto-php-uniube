<?php
class Task extends Model {
    public function create(int $userId, string $title, ?string $description = null, ?string $event_date = null, ?string $location = null) {
        $stmt = $this->db->prepare('INSERT INTO tasks (user_id, title, description, event_date, location) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$userId, $title, $description, $event_date, $location]);
        return $this->db->lastInsertId();
    }

    public function findByUser(int $userId) {
        $stmt = $this->db->prepare('SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id) {
        $stmt = $this->db->prepare('SELECT * FROM tasks WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $title, ?string $description = null, ?string $event_date = null, ?string $location = null) {
        $stmt = $this->db->prepare('UPDATE tasks SET title = ?, description = ?, event_date = ?, location = ? WHERE id = ?');
        return $stmt->execute([$title, $description, $event_date, $location, $id]);
    }

    public function delete(int $id) {
        $stmt = $this->db->prepare('DELETE FROM tasks WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
