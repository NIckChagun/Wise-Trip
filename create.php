<?php
 $servername = "localhost";
 $hostname = "root";
 $password = "1234";
 $database = "myproject";

 //Create connection
 $connection = new mysqli($servername, $hostname, $password, $database);

$first_last_name = "";
$username = "";
$password = "";
$lineid = "";
$birthdate = "";

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_last_name = $_POST['first_last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lineid = $_POST['lineid'];
    $birthdate = $_POST['birthdate'];

    do {
        if ( empty($first_last_name) || empty($username) || empty($password) || empty($lineid) || empty($birthdate) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new client to database
        $sql =  "INSERT INTO users (first_last_name, username, password, lineid, birthdate) " .
                "VALUES ('$first_last_name', '$username', '$password', '$lineid', '$birthdate')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
 

        $first_last_name = "";
        $username = "";
        $password = "";
        $lineid = "";
        $birthdate = "";

        $successMessage = "Client added correctly";

        header("location: index.php");
        exit;

    } while (false);
};
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
        <h2>New user</h2>

        <?php
        if ( ! empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'><button>
            </div>
            ";
        }
        ?>

        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="first_last_name" value="<?php echo $first_last_name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">LineID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lineid" value="<?php echo $lineid; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Birthdate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
                </div>
            </div>

            <?php
            if ( ! empty($successMessage) ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert aria-label='Close'><button>
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
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>