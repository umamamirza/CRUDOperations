
<?php

include('dbConnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($name) && !empty($email) && !empty($password)) {
        
        $sql = "INSERT INTO records(name, email, password) VALUES ('$name', '$email', '$password')";
        
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo json_encode(array('success' => true, 'message' => 'Data saved successfully!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Unable to Save Data: ' . $conn->error));
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'Please provide name, email, and password.'));
    }
}

$conn->close();
?>
