<?php
$conn = mysqli_connect('localhost', 'root', '', 'course_timetable');

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
