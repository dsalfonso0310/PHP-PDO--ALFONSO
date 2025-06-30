-- Library Books Table
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_year YEAR NOT NULL,
    genre VARCHAR(100) NOT NULL
);

-- Attendance Table
CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    status ENUM('Present', 'Absent', 'Late') NOT NULL
);

-- Movies Table
CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL,
    release_year YEAR NOT NULL,
    genre VARCHAR(100) NOT NULL,
    available BOOLEAN NOT NULL DEFAULT 1
);

-- Timelogs Table
CREATE TABLE IF NOT EXISTS timelogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    type ENUM('IN', 'OUT') NOT NULL
);
