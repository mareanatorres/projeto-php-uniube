<?php
class Controller {
    protected function view(string $path, array $data = []) {
        extract($data);
        require __DIR__ . '/../Views/layout/header.php';
        require __DIR__ . '/../Views/' . $path . '.php';
        require __DIR__ . '/../Views/layout/footer.php';
    }

    protected function redirect(string $url) {
        header('Location: ' . $url);
        exit;
    }

    protected function isLogged(): bool {
        return !empty($_SESSION['user_id']);
    }

    protected function requireAuth() {
        if (!$this->isLogged()) {
            $this->redirect('/public/index.php?c=auth&a=login');
        }
    }
}
