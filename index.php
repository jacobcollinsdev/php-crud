<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>PHP CRUD</title>
</head>
<body>
    <?php require_once('process.php');?>
    <div class="container">
        <?php
            // CONNECT TO DATABASE
            $db = new mysqli('localhost', 'root', 'cuvxus', 'crud') or die("Connection failed: ".$db->connect_error);
            // SELECT EXISTING RECORDS
            $result = $db->query("SELECT * FROM data") or die($db->connect_error);
            // pre_r($result->fetch_assoc());
        ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            <?php
                // LOOP THROUGH RECORDS AND DISPLAY THEM IN THE TABLE
                while($row = $result->fetch_assoc()): 
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <!-- LINK TO INDEX.PHP FILE AND PASS EDIT AS A VARIABLE -->
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <!-- LINK TO PROCESS.PHP FILE AND PASS DELETE AS A VARIABLE -->
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>

            </table>
        </div>

        <?php
                function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>

        <div class="row justify-content-center">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" name="name" id="name" value="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input class="form-control" type="text" name="location" id="location" value="Enter Your Location">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>