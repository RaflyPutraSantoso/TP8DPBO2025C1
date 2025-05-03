CREATE DATABASE tp_mvc;
USE tp_mvc;

-- Tabel Groups
CREATE TABLE groups (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Tabel Students (dengan relasi ke Groups)
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    phone VARCHAR(15),
    join_date DATE,
    group_id INT,
    FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE SET NULL
);

-- Data Contoh
INSERT INTO groups (name, description) VALUES
('Grupa A', 'Grup untuk mahasiswa angkatan 2023'),
('Grupa B', 'Grup untuk mahasiswa angkatan 2024');

INSERT INTO students (name, nim, phone, join_date, group_id) VALUES
('Andi', '12345', '08123456789', '2023-01-01', 1),
('Budi', '54321', '08987654321', '2023-02-15', 2);