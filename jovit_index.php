<!--display data--->
<?php
    session_start();
    require 'jovit_dbConn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <!-- <?php include('message.php'); ?> -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Details
                            <a href="jovit_addData.php" class="btn btn-primary float-end">Add Data</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Birthdate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM tbl_jovit";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $details)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $details['id']; ?></td>
                                                <td><?= $details['firstName']; ?></td>
                                                <td><?= $details['lastName']; ?></td>
                                                <td><?= $details['gender'] == '1' ? "Male":"Female"; ?></td>
                                                <td><?= $details['address']; ?></td>
                                                <td><?= $details['birthDate']; ?></td>
                                                
                                                <td>
                                                 <a href="jovit_edit.php?id=<?= $details['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                 <form action="jovit_code.php" method="POST" class="d-inline">
                                                 <button type="submit" name="delete_data" value="<?= $details['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>