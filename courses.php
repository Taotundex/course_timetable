<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $lecturer_id = $_POST['lecturer_id'];
    
    $query = "INSERT INTO courses (name, description, lecturer_id) VALUES ('$name', '$description', '$lecturer_id')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo 'Course added successfully';
    } else {
        echo 'Error adding course';
    }
}

?>