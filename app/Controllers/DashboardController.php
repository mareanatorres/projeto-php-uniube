<?php
class DashboardController extends Controller {
    public function index() {
        $this->requireAuth();
        $userId = (int)$_SESSION['user_id'];

        $taskDao = new TaskDAO();
        $tasks = $taskDao->forUser($userId);

        $this->view('dashboard', ['tasks' => $tasks]);
    }
}
