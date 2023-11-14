<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCISE 3 (UPDATE, INSERT, DELETE QUERY)</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body>
<?php include('jovit_message.php'); ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h4>Add Details Here:
                        <a href="jovit_index.php" class = "btn btn-danger float end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="jovit_code.php" method="POST">
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="firstName" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lastName" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Birthdate:</label>
                                <input type="date" name="birthDate" class="form-control">
                            </div>
                            <div class="mb-3">
                                <!-- <a href="jovit_index.php" name ="save_details" class = "btn btn-primary">SAVE</a> -->
                                <button type="submit" name="save_details" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>