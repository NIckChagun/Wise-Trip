<?php
 $servername = "localhost";
 $hostname = "root";
 $password = "1234";
 $database = "myproject";

//Create connection
$connection = new mysqli($servername, $hostname, $password, $database);

$id = "";
$first_last_name = "";
$username = "";
$password = "";
$lineid = "";
$birthdate = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: Show the data of the users
    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the select users from database table
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }
    
    $first_last_name = $row["first_last_name"];
    $username = $row["username"];
    $password = $row["password"];
    $lineid = $row["lineid"];
    $birthdate = $row["birthdate"];
}
else {
    //POST method: Update the data of the client

    $id = $_POST["id"];
    $first_last_name = $_POST["first_last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $lineid = $_POST["lineid"];
    $birthdate = $_POST["birthdate"];

    do {
        if ( empty($id) || empty($first_last_name) || empty($username) || empty($password) || empty($lineid) || empty($birthdate) ) {
            $errorMessage = "ใส่ข้อมูลให้ครบถ้วน โปรดลองอีกครั้ง";
            break;
        }

        $sql =  "UPDATE users " . 
                "SET first_last_name = '$first_last_name', username = '$username', password = '$password', lineid = '$lineid', birthdate = '$birthdate' " .
                "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
             break;
        }

        $successMessage = "User updated successfully";

        header("location: index.php");
        exit;

    } while (false);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit user</h2>
        <br>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";

        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-from-lable">First Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="first_last_name" value="<?php echo $first_last_name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-lable">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                </div>


            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-lable">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>


            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-lable">LineID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lineid" value="<?php echo $lineid; ?>">
                </div>


            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-lable">Birthdate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
                </div>


            </div>



            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role-'alert'>
                                <strong>$successMessage</strong>
                                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-labe.
                            </div>
                        </div>
                    </div>
                    ";

                    
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button"> Cancel </a>
                </div>
            </div>





    </div>
</body>
</html>