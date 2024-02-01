<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Wise Trip</title>
</head>
<body>

    <div class="wrapper">

        <form action="signin.php" method="post">

            <div class="content">

                <div class="login-left">

                    <div class="head">
                        <h1>เข้าสู่ระบบด้วยบัญชี</h1>
                        <h2>ยินดีต้อนรับสู่</h2>
                    </div>

                    <div class="login-container">
                        
                        <a href="home.php"><h1 id="wise2">Wise</h1></a>
                        <a href="home.php"><h1 id="trip2">Trip</h1></a>

                        <?php   if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <div class="login-input">

                            <div class="email-input">
                                
                                <input type="email" class="form-control" id="input-email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <input type="password" class="form-control" id="input-password" name="password" password="password" aria-describedby="emailHelp" placeholder="Enter passord">
                            
                            </div>

                        </div>
    
                    </div>

                    <div class="forget">

                        <a href="register.php"><h2>ลืมรหัสผ่าน ?</h2></a>

                    </div>

                    <div class="login-button">

                        <button type="submit" class="btn btn-primary" name="login">Login</button>

                    </div>

                    <div class="road-register">

                        <div class="line-left"></div>

                        <h2>หรือ เข้าสู่ระบบด้วย</h2>

                        <div class="line-right"></div>

                        <div class="social-login">

                            <div id="google">
                                <img src="image/google-logo.png">
                            </div>

                            <div id="facebook">
                                <img src="image/logo-facebook.png">
                            </div>

                            <div class="ask-register">

                                <a href="register.php"><h2>ยังไม่มีบัญชี ?</h2></a>
                                <h2>สร้างบัญชีเลย</h2>
                            
                            </div>


                        </div>

                    </div>

                </div><!-- login-left -->

                <div class="login-right">

                    <div class="head-right">

                        <a href="home.php"><h1 id="wise2">Wise</h1></a>
                        <a href="home.php"><h1 id="trip2">Trip</h1></a>

                    </div>

                    <div class="backer">

                        <img src="image/Travel.png">

                    </div>

                    <div class="des-right">

                        <h1>ช่วยวางแผนการท่องเที่ยวของคุณให้ดียิ่งขึ้น</h1>

                    </div>

                </div> <!--login-right -->

            </div>

        </form>

    </div>

</body>
</html>