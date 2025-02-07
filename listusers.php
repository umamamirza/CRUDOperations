<?php
include('dbConnection.php');
$sql = "SELECT * FROM records"; 
$result = $conn->query($sql);

$response = array(); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row; 
    }
} else {
    $response["message"] = "No records found.";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>

   