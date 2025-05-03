<?php
class Student {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    // Ambil semua data
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM students");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Tambah data baru
    public function create($name, $nim, $phone, $join_date) {
        $stmt = $this->conn->prepare("INSERT INTO students (name, nim, phone, join_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $nim, $phone, $join_date);
        return $stmt->execute();
    }

    // Hapus data
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Error deleting student: " . $stmt->error);
            return false;
        }
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $name, $nim, $phone, $join_date) {
        $stmt = $this->conn->prepare("UPDATE students SET name = ?, nim = ?, phone = ?, join_date = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $nim, $phone, $join_date, $id);
        return $stmt->execute();
    }
}
?>