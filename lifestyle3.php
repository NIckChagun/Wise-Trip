<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/style_lifestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>
<body>

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid" id="navbar">
            <div class="logo"><img src="image/logo.png" alt=""></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_home" href="home2.php" role="button">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_register" href="plantrip.php" role="button">สร้างทริป</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_login" href="logout.php" role="button"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="album py-5 bg-body-tertiary" id="lifestyle">

        <div id="head-style"><h1>เลือกอาหารที่คุณชอบ</h1></div>

        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5" id="row">

                <div class="col">
                    <div class="card shadow-sm" id="card">
                        <label class="option_item">
                        <input type="checkbox" class="checkbox">
                        <div class="option_inner facebook">
                            <img src="image/fine.png"width="100%" height="400">
                            <div class="name"><h1>Fine Dining</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm" id="card">
                        <label class="option_item">
                        <input type="checkbox" class="checkbox">
                        <div class="option_inner facebook">
                            <img src="image/thai.png"width="100%" height="400">
                            <div class="name"><h1>อาหารพื้นเมือง</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm" id="card">
                    <label class="option_item">
                        <input type="checkbox" class="checkbox">
                        <div class="option_inner facebook">
                        <img src="image/streetfood.png"width="100%" height="400">
                            <div class="name"><h1>Street Food</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm" id="card">
                    <label class="option_item">
                    <input type="checkbox" class="checkbox">
                        <div class="option_inner facebook">
                        <img src="image/japan.png"width="100%" height="400">
                            <div class="name"><h1>อาหารญี่ปุ่น</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm" id="card">
                    <label class="option_item">
                    <input type="checkbox" class="checkbox">
                        <div class="option_inner facebook">
                        <img src="image/fastfood.png"width="100%" height="400">
                            <div class="name"><h1>ฟาสต์ฟู้ด</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm" id="card">
                    <label class="option_item">
                    <input type="checkbox" class="checkbox">
                        <div class="option_inner facebook">
                        <img src="image/seafood.jpg"width="100%" height="400">
                            <div class="name"><h1>อาหารทะเล</h1></div>
                        </div>
                    </div>
                </div>

                <div id="btn-next">
                    <a class="btn btn-primary" href="home2.php" role="button"><h1>ต่อไป</h1></a>
                </div>
            
            </div>
        </div>
    </div>

    





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>