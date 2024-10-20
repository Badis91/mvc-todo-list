<?php
require_once __DIR__ . '/../src/Router/Router.php';
require_once __DIR__ . '/../src/Controllers/TaskController.php';

$router = new Router();
$taskController = new TaskController();

$router->add('/', [$taskController, 'index']);
$router->add('/create', [$taskController, 'create']);
$router->add('/edit', function() use ($taskController) {
    $taskController->edit($_GET['id'] ?? null);
});
$router->add('/delete', function() use ($taskController) {
    $taskController->delete($_GET['id'] ?? null);
});

$router->dispatch();
?>
