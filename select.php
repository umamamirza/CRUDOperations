<?php


include 'dbConnection.php';
header('Content-Type: application/json');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$response = ["success" => false, "message" => "Invalid ID"];

if ($id > 0) {
    $stmt = $conn->prepare("SELECT id, name, email, password FROM records WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $response = ["success" => true, "data" => $user];
        // {"success":true,"data":{"id":"name":"","email":"","password":""}}
    } else {
        $response["message"] = "User not found!";
    }
    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>







