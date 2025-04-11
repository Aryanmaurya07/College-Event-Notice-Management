<?php
include("../includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check = "SELECT * FROM register_students WHERE email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "Email already registered!";
    } else {
        $sql = "INSERT INTO register_students (student_id, name, email, password) 
                VALUES ('$student_id', '$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Invalid request!";
}
?>

