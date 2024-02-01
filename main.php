<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.stylemain.css">
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <title>Wise Trip</title>
</head>
<body>
    <form action="signin.php" method="post">
        <h2>LOGIN</h2>

        <?php   if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>