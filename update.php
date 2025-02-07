<?php
include 'dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if  ($id > 0 && !empty($name) && !empty($email) && !empty($password))  {
        $sql = "UPDATE records SET name='$name', email='$email', password='$password' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => true, "message" => "Data updated successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error updating record: " . $conn->error]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid data received!"]);
    }
}
?>