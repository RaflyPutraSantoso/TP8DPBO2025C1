<?php
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../config/Connection.php';

class StudentsController {
    private $student;

    public function __construct() {
        global $conn;
        $this->student = new Student($conn);
    }

    public function index() {
        $students = $this->student->getAll();
        require __DIR__ . '/../views/students/index.php';
    }

    public function create() {
        require __DIR__ . '/../views/students/create.php';
    }

    public function store() {
        $this->student->create(
            $_POST['name'],
            $_POST['nim'],
            $_POST['phone'], 
            $_POST['join_date']
        );
        header("Location: index.php?action=index");
    }

    public function edit($id) {
        $student = $this->student->getById($id);
        
        if(!$student) {
            header("Location: index.php?action=index");
            exit;
        }
        
        require __DIR__ . '/../views/students/edit.php';
    }

    public function update($id) {
        $this->student->update(
            $id,
            $_POST['name'],
            $_POST['nim'],
            $_POST['phone'], 
            $_POST['join_date']
        );
        header("Location: index.php?action=index");
    }

    public function delete($id) {
        $this->student->delete($id);
        header("Location: index.php?action=index");
        exit;
    }
}
?>