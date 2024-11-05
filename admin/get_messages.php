<?php
include '../dbconn/dbconn.php';

$sql = "SELECT username, message, timestamp FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();

echo json_encode($messages);
?>
