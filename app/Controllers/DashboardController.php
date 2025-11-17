<?php
class DashboardController extends Controller {
    public function index() {
        $this->requireAuth();
        $userId = (int)$_SESSION['user_id'];

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$userId]);
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->view('dashboard', ['tasks' => $tasks]);
    }
}
