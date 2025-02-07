


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style2.css">

</head>
<body class="container mt-4">
    <h2>Edit User</h2>
    <form id="edit-form" method ="POST"  >

    <input type="hidden" name="id"  class="form-control" id="user_id">
        <div >
            <label>Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email"  id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password"  id="password" class="form-control">
        </div>
        <button type="submit" id="updatedata" class="btn btn-outline-primary">Update</button>
        <a href="index.php" class="btn btn-outline-dark">Back</a>
    </form>
    <script>
         function getQueryStringValue(key) {
                return new URLSearchParams(window.location.search).get(key);
            }
        $(document).ready(function() {

            var userId = getQueryStringValue('id'); 

            if (userId) {
                $("#user_id").val(userId); 

       
                $.ajax({
                    url: 'select.php',
                    type: 'GET',
                    dataType: 'json',
                    data: { id: userId },
                    success: function(response) {
                        if (response.success) {
                          
                            $("#name").val(response.data.name);
                            $("#email").val(response.data.email);
                            $("#password").val(response.data.password);

                        } else {
                            alert("Failed to fetch user data: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error retrieving user data:", error);
                    }
                });
            }




    
            $("#updatedata").click(function(event) { 
        event.preventDefault(); 

        var id = $("#user_id").val(); 
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        
        $.ajax({
            url: 'update.php',
            type: 'POST',
            dataType: 'json', 
            data: { 
                id: id,  
                name: name,
                email: email,
                password: password 
            },
            success: function(response) {
                if (response.success) {
                    alert("Data updated successfully!");
                    window.location.href = "index.php"; 
                } else {
                    alert("Update failed: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert(" An error occurred while updating data.");
                console.error("Error: ", error);
            }
        });
    });







        });








    </script>
</body>
</html>















