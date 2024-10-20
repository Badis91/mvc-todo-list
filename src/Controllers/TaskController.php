<?php
require_once __DIR__ . '/../Models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        ob_start();
        require __DIR__ . '/../Views/task_list.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layout.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $this->taskModel->createTask($title, $description);
            header('Location: /');
            exit;
        } else {
            ob_start();
            require __DIR__ . '/../Views/task_form.php';
            $content = ob_get_clean();
            require __DIR__ . '/../Views/layout.php';
        }
    }

    public function edit($id) {
        if (!$id) {
            header('Location: /');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $this->taskModel->updateTask($id, $title, $description);
            header('Location: /');
            exit;
        } else {
            $task = $this->taskModel->getTaskById($id);
            ob_start();
            require __DIR__ . '/../Views/task_edit.php';
            $content = ob_get_clean();
            require __DIR__ . '/../Views/layout.php';
        }
    }

    public function delete($id) {
        if ($id) {
            $this->taskModel->deleteTask($id);
        }
        header('Location: /');
        exit;
    }
}
?>
