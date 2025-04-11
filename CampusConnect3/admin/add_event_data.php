<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "campusconnect");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['event_name'];
$date = $_POST['event_date'];
$time = $_POST['event_time'];
$location = $_POST['event_location'];
$desc = $_POST['event_desc'];

// Handle image upload
$imageName = '';
if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === 0) {
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $imageName = uniqid() . "_" . basename($_FILES["event_image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    move_uploaded_file($_FILES["event_image"]["tmp_name"], $targetFilePath);
}

// Insert into database
$sql = "INSERT INTO events (event_name, event_date, event_time, event_location, event_desc, event_image)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $date, $time, $location, $desc, $imageName);

if ($stmt->execute()) {
    header("Location: manage_events.php?success=1");
    exit();
} else {
    echo "Something went wrong: " . $stmt->error;
}
?>
