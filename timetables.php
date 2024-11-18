<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $lecturer_id = $_POST['lecturer_id'];
    $student_id = $_POST['student_id'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    
    $query = "INSERT INTO timetables (course_id, lecturer_id, student_id, day, time) VALUES ('$course_id', '$lecturer_id', '$student_id', '$day', '$time')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo 'Timetable added successfully';
    } else {
        echo 'Error adding timetable';
    }
}


?>