<?php  
include('dbConnection.php');

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="1style.css">
</head>
<body class="container mt-4">
    <h2>Add New User</h2> 
    <form method="POST">
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email"  id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password:</label>
            <input type="text" name="password"  id="password" class="form-control" required>
        </div>
        <button type="submit" id="saveData" class="btn btn-outline-primary">Save</button>
        <a href="index.php" class="btn btn-outline-dark">Back</a>
        
    </form>
</body>
</html>

<script>


$(document).ready(function() {
    $("#saveData").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        
        $.ajax({
            url: 'save.php',
            type: 'POST',
            dataType: 'json', 
            data: { 
                name: name,
                email: email,
                password: password 
            },
            success: function(response) {
                if (response.success) {
                    alert("Data saved successfully!"); 
                } else {
                    alert("Failed to save data: " + response.message);
                }
            },
           

        });
    });
});

</script>




</body>




</html>
