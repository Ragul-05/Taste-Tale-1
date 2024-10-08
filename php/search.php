<?php
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'taste_tales');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_GET['q']) ? $_GET['q'] : '';
$response = [];

if ($query !== '') {
    $stmt = $conn->prepare("SELECT name FROM recipes WHERE name LIKE CONCAT('%', ?, '%') LIMIT 10");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $response[] = $row; // Push matching recipe names into the response array
    }
}

$stmt->close();
$conn->close();

echo json_encode($response); // Return the response as JSON
?>
