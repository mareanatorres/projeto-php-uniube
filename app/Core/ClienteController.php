<?php
class ClienteController extends Controller {
    private ClienteDAO $dao;
    public function __construct() {
        $this->dao = new ClienteDAO();
    }

    public function index() {
        $this->requireAuth();
        $clientes = $this->dao->all();
        $this->view('clientes/index', ['clientes' => $clientes]);
    }

    public function create() {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente($_POST);
            $id = $this->dao->create($cliente);
            $this->redirect('/public/index.php?c=cliente&a=index');
        }
        $this->view('clientes/create');
    }

    public function edit() {
        $this->requireAuth();
        $id = (int)($_GET['id'] ?? 0);
        $data = $this->dao->read($id);
        if (!$data) $this->redirect('/public/index.php?c=cliente&a=index');
        $this->view('clientes/edit', ['cliente' => $data]);
    }

    public function update() {
        $this->requireAuth();
        $cliente = new Cliente($_POST);
        $cliente->id = (int)($_POST['id'] ?? 0);
        $this->dao->update($cliente);
        $this->redirect('/public/index.php?c=cliente&a=index');
    }

    public function delete() {
        $this->requireAuth();
        $id = (int)($_POST['id'] ?? 0);
        $this->dao->delete($id);
        $this->redirect('/public/index.php?c=cliente&a=index');
    }
}
