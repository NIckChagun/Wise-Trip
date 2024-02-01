<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"></div>
    <h2>List of users</h2>
    <a class="btn btn-primary" id="btn_register" href="register.php" role="button">New User</a>
    <a class="btn btn-primary" id="btn_register" href="login.php" role="button">Old User</a>

    <br>
    <table class="table">
        <thread>
            <tr>
                <th>ID</th>
                <th>First_Last_Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>LineID</th>
                <th>Birtgdate</th>
            </tr>
        </thread>
         <tbody>
            <?php
                 $servername = "localhost";
                $hostname = "root";
                $password = "1234";
                $database = "myproject";

                //Create connection
                $connection = new mysqli($servername, $hostname, $password, $database);
            
                //Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM users WHERE status=1";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: ". $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[userID]</td>
                        <td>$row[first_last_name]</td>
                        <td>$row[username]</td>
                        <td>$row[password]</td>
                        <td>$row[lineid]</td>
                        <td>$row[birthdate]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?userID=$row[userID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?userID=$row[userID]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
         </tbody>
    </table>
</body>
</html>