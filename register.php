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
            $errorMessage = "ใส่ข้อมูลให้ครบถ้วน";
            break;
        }

        // add new client to database
        $sql =  "INSERT INTO users (first_last_name, username, password, lineid, birthdate, status) " .
                "VALUES ('$first_last_name', '$username', '$password', '$lineid', '$birthdate', 1)";
        $result = $connection->query($sql);

        if ($result) {
            $successMessage = "สมัครสมาชิกเรียบร้อยแล้ว";
        } else {
            $errorMessage = "เกิดข้อผิดพลาดในการสมัครสมาชิก: " . $connection->error;
        }
        

        // if (!$result) {
        //     $errorMessage = "Invalid query: " . $connection->error;
        //     break;
        // }

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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="register">

        <div class="register-left">

            <div class="head-register">
                <h2>สมัครสมาชิก</h2>

                <?php
                if ( ! empty($errorMessage) ) {
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' id='alert-error' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'><button>
                    </div>
                    ";
                }
                ?>
            </div>

            <!-- <?php
            if ( ! empty($errorMessage) ) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' id='alert-error' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'><button>
                </div>
                ";
            }
            ?> -->
            
                <form method="post">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" id="head-name">ชื่อ-สกุล</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input-name" name="first_last_name" placeholder="ชื่อ-สกุล..." value="<?php echo $first_last_name; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" id="head-username">อีเมล</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="input-username" name="username" placeholder="อีเมล..." value="<?php echo $username; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" id="head-password">รหัสผ่าน</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input-pass" name="password" placeholder="รหัสผ่าน..." value="<?php echo $password; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" id="head-lineid">ไลน์ไอดี</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input-lineid" name="lineid" placeholder="ไลน์ไอดี..." value="<?php echo $lineid; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" id="head-birthdate">เดือนเกิด</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input-birthdate" name="birthdate" placeholder="เดือนเกิด..." value="<?php echo $birthdate; ?>">
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
                            <button type="submit" class="btn btn-primary" id="submit">สมัครสมาชิก</button>
                        </div>
                        <!-- <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                        </div> -->
                    </div>

                </form>

            </div><!-- table-register -->

        </div><!-- register-left -->

        <div class="register-right">

            <div class="welcome">
                <h1>Welcome</h1>
            </div>

            <a href="home.php"><h1 id="wise3">Wise</h1></a>
            <a href="home.php"><h1 id="trip3">Trip</h1></a>

            <img src="image/backer.png">

        </div><!-- register-right -->

    </div>

</body>
</html>