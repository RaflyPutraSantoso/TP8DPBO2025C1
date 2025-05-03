<?php
require_once __DIR__ . '/controllers/StudentsController.php';

$action = $_GET['action'] ?? 'home';

$controller = new StudentsController();

switch($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update($_GET['id']);
        break;
    default:
        require __DIR__ . '/views/home/index.php';
}
?>