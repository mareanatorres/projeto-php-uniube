<?php
class EventController extends Controller {
    public function index() {
        $this->requireAuth();
        $userId = (int)$_SESSION['user_id'];

        $taskDao = new TaskDAO();
        $events = $taskDao->forUser($userId);

        $this->view('events/index', ['events' => $events]);
    }

    public function create() {
        $this->requireAuth();
        $this->view('events/form', ['event' => null]);
    }

    public function store() {
        $this->requireAuth();
        $userId = (int)$_SESSION['user_id'];
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? null;
        $event_date = $_POST['event_date'] ?? null;
        $location = $_POST['location'] ?? null;

        $taskDao = new TaskDAO();
        $id = $taskDao->create($userId, $title, $description, $event_date, $location);

        header('Location: /public/index.php?c=event&a=index');
        exit;
    }

    public function edit() {
        $this->requireAuth();
        $id = (int)($_GET['id'] ?? 0);
        $taskDao = new TaskDAO();
        $event = $taskDao->find($id);
        if (!$event) {
            http_response_code(404);
            echo "Evento não encontrado";
            return;
        }
        $this->view('events/form', ['event' => $event]);
    }

    public function update() {
        $this->requireAuth();
        $id = (int)($_POST['id'] ?? 0);
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? null;
        $event_date = $_POST['event_date'] ?? null;
        $location = $_POST['location'] ?? null;

        $taskDao = new TaskDAO();
        $taskDao->update($id, $title, $description, $event_date, $location);

        header('Location: /public/index.php?c=event&a=index');
        exit;
    }

    public function delete() {
        $this->requireAuth();
        $id = (int)($_GET['id'] ?? 0);
        $taskDao = new TaskDAO();
        $taskDao->delete($id);
        header('Location: /public/index.php?c=event&a=index');
        exit;
    }
}
