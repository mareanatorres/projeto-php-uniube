<?php
class AuthController extends Controller {
    private User $userModel;
    public function __construct(){ $this->userModel = new User(); }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->findByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = (int)$user['id'];
                $_SESSION['user_name'] = $user['name'];
                $this->redirect('/public/index.php');
            } else {
                $this->view('auth/login', ['error' => 'Credenciais inválidas']);
            }
            return;
        }
        $this->view('auth/login');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            if (!$name || !$email || !$password) {
                $this->view('auth/register', ['error'=>'Preencha todos os campos']);
                return;
            }
            if ($this->userModel->findByEmail($email)) {
                $this->view('auth/register', ['error'=>'Email já cadastrado']);
                return;
            }
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $this->userModel->create($name, $email, $hash);
            $this->redirect('/public/index.php?c=auth&a=login');
        } else {
            $this->view('auth/register');
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        session_start();
        $this->redirect('/public/index.php?c=auth&a=login');
    }
}
