<?php
include('dbConnection.php');

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("Error: Invalid ID provided.");
}

$id = intval($_POST['id']); 

$sql = "DELETE FROM records WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("i", $id);

if ($statement->execute()) {
    echo "success";
} else {
    echo "Error: " . $conn->error;
}

$statement->close();
$conn->close();
?>
