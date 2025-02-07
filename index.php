<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
</head>
      <body class="container mt-5">
    <h2 class="mb-4" >CRUD</h2>
    <a href="create.php" class="btn btn-outline-success mb-3">Add new User</a>

    <table class="table table-bordered" id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="userData">
        </tbody>
    </table>

<script>
 $(document).ready(function() {
        function loadUser() {
            $.ajax({
                url: 'listusers.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var rows = '';

                    if (response.length === 0) {
                        rows = '<tr><td colspan="4" class="text-center">No records found</td></tr>';
                    } else {
                        response.forEach(function(user) {
                            rows += `<tr id="row_${user.id}">
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.password}</td>
                                <td>
                                    <a href="edit.php?id=${user.id}" class="btn btn-outline-primary btn-sm editbtn ">Edit</a>
                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="${user.id}">Delete</button>
                                </td>
                            </tr>`;
                        });
                    } 

                    $('#userTable tbody').html(rows);
                },
                
            });
        }

        loadUser();
    });

    $(document).on("click", ".delete-btn", function () {
            var id = $(this).data("id");

            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: { id: id },
                    success: function(response) {
                        if (response.trim() === "success") {
                            alert("Record deleted successfully!");
                            $("#row_" + id).remove();    
                        } else {
                            alert("Error deleting record: " + response);
                        } 
                    }
                });
            }
        });















</script>




</body>
</html>