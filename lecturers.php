// lecturers.php
<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO lecturers (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(array('message' => 'Lecturer added successfully'));
    } else {
        echo json_encode(array('message' => 'Error adding lecturer'));
    }
}

// Close connection
mysqli_close($conn);

?>