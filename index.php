<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance_system');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch attendance records from the database
$sql = "SELECT fingerprintID, timestamp FROM attendance ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
</head>
<body>
    <h1>Attendance Records</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>Fingerprint ID</th>
            <th>Timestamp</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["fingerprintID"] . "</td><td>" . $row["timestamp"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
