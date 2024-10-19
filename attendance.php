<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fingerprintID = $_POST['fingerprintID'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'fingerprint_attendance');

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the attendance table
    $sql = "INSERT INTO attendance (fingerprintID, timestamp) VALUES ('$fingerprintID', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        echo "Attendance recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
