<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/stylehome2.css">
    <link rel="stylesheet" href="css/style_lifestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body id="top">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid" id="navbar">
            <div class="logo"><img src="image/logo.png" alt=""></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_home" href="index.php" role="button">Home</a>
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






    <!-- 
        - #POPULAR
      -->

    <section class="popular" id="destination">
        <div class="container">

            <p class="section-subtitle">แนะนำสำหรับคุณ</p>

            <h2 class="h2 section-title">สถานที่ยอดนิยม</h2>

            <p class="section-text">
                สถานที่ยอดนิยมที่มีผู้คนมักเลือกไปมากที่สุด
            </p>

            <ul class="popular-list">

                <li>
                    <div class="popular-card">

                        <figure class="card-img">
                            <img src="./image/doi.webp" alt="" loading="lazy">
                        </figure>

                        <div class="card-content">

                            <div class="card-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <p class="card-subtitle">
                                <a href="#">จังหวัดเชียงใหม่</a>
                            </p>

                            <h3 class="h3 card-title">
                                <a href="#">ดอยอินทนนท์ </a>
                            </h3>

                            <p class="card-text">
                                มีสภาพอากาศที่เย็นตลอดทั้งปี นักท่องเที่ยวนิยมขึ้นไปบนดอยอินทนนท์ เพื่อเดินชมป่าดิบเขาที่เต็มไปด้วยต้นไม้สูงใหญ่
                            </p>

                        </div>

                    </div>
                </li>

                <li>
                    <div class="popular-card">

                        <figure class="card-img">
                            <img src="./image/Grande-Centre-Point-Space-Pattaya-444.jpg" alt="" loading="lazy">
                        </figure>

                        <div class="card-content">

                            <div class="card-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <p class="card-subtitle">
                                <a href="#">จังหวัดชลบุรี</a>
                            </p>

                            <h3 class="h3 card-title">
                                <a href="#">Grande Centre Point Space Pattaya</a>
                            </h3>

                            <p class="card-text">
                                ที่พักสุดตื่นเต้นใจสุดอลังการ เปิดใหม่ล่าสุด กลางเมืองพัทยา มาในธีมท่องโลกอวกาศ
                            </p>

                        </div>

                    </div>
                </li>

                <li>
                    <div class="popular-card">

                        <figure class="card-img">
                            <img src="./image/lam.jpg" alt="Kyoto temple, japan" loading="lazy">
                        </figure>

                        <div class="card-content">

                            <div class="card-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <p class="card-subtitle">
                                <a href="#">จังหวัดภูเก็ต</a>
                            </p>

                            <h3 class="h3 card-title">
                                <a href="#">แหลมพรหมเทพ</a>
                            </h3>

                            <p class="card-text">
                                จุดชมพระอาทิตย์ตก ที่สวยเป๋นอันดับต้นๆ ในประเทศไทย นั่งชิล ได้รับลมทะเลเย็นๆ บรรยากาศโรแมนติก
                            </p>

                        </div>

                    </div>
                </li>

            </ul>

            <button class="btn btn-primary">สถานที่อื่น ๆ เพิ่มเติม</button>

        </div>
    </section>





    <!-- 
        - #PACKAGE
      -->

    <section class="package" id="package">
        <div class="container">

            <p class="section-subtitle">ทริปยอดนิยม</p>

            <h2 class="h2 section-title">ทริปยอดนิยม ที่คุณอาจสนใจ</h2>

            <p class="section-text">
                รวมทริปที่มีคนถูกใจมากที่สุด ใช้วางแผนทริปและ น่าเที่ยวตามมากที่สุด
            </p>

            <ul class="package-list">

                <li>
                    <div class="package-card">

                        <figure class="card-banner">
                            <img src="./image/packege-1.jpg" alt="Experience The Great Holiday On Beach" loading="lazy">
                        </figure>

                        <div class="card-content">

                            <h3 class="h3 card-title">3 วัน 2 คืน ที่ชลบุรี กินหรูอยู่สบาย</h3>

                            <p class="card-text">
                                สวัสดีค่ะทุกคน 🙏 ทริปนี้พลอยจะพาทุกคนไปทัวร์สัตหีบ ชลบุรีกัน ทริปนี้เป็นการเดินทางที่แสนยาวนานมากจากจังหวัดมหาสารคาม ไปสัตหีบ ชลบุรี รวมระยะทาง 570 กิโลเมตรเลยทีเดียว ในทริปและระหว่างทริป เราเจออะไรและเที่ยวที่ไหนบ้าง ไปดูกันเลยค้า
                            </p>

                            <ul class="card-meta-list">

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="time"></ion-icon>

                                        <p class="text">3D/2N</p>
                                    </div>
                                </li>

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="people"></ion-icon>

                                        <p class="text">2 คน </p>
                                    </div>
                                </li>

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>

                                        <p class="text">ชลบุรี</p>
                                    </div>
                                </li>

                            </ul>

                        </div>

                        <div class="card-price">

                            <div class="wrapper">

                                <p class="reviews">(2500 ถูกใจ)</p>

                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                            </div>

                            <p class="price">
                                6,500 บาท
                                <span>ค่าใช้จ่าย</span>
                            </p>

                            <button class="btn btn-secondary">อ่านเพิ่มเติม</button>

                        </div>

                    </div>
                </li>

                <li>
                    <div class="package-card">

                        <figure class="card-banner">
                            <img src="./image/เขื่อนแม่งัด 1.jpg" alt="Summer Holiday To The Oxolotan River" loading="lazy">
                        </figure>

                        <div class="card-content">

                            <h3 class="h3 card-title">แพลนเที่ยวเชียงใหม่ 3 วัน 2 คืน ฉบับปี 2023 เที่ยว อิ่มครบในทริปเดียว</h3>

                            <p class="card-text">
                                วันนี้เราเลยขอนำเสนอที่เที่ยวเชียงใหม่ซึ่งส่วนใหญ่เป็นพิกัดที่ยังไม่ค่อยช้ำ เผื่อใครกำลังวางแผนเที่ยวอยู่พอดี จะได้หยิบเอาแพลนนี้ไปเป็นไกด์ไลน์
                            </p>

                            <ul class="card-meta-list">

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="time"></ion-icon>

                                        <p class="text">3D/2N</p>
                                    </div>
                                </li>

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="people"></ion-icon>

                                        <p class="text">2คน</p>
                                    </div>
                                </li>

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>

                                        <p class="text">เชียงใหม่</p>
                                    </div>
                                </li>

                            </ul>

                        </div>

                        <div class="card-price">

                            <div class="wrapper">

                                <p class="reviews">(2000 ถูกใจ)</p>

                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                            </div>

                            <p class="price">
                                5000 บาท
                                <span>ค่าใช้จ่าย</span>
                            </p>

                            <button class="btn btn-secondary">อ่านเพิ่มเติม</button>

                        </div>

                    </div>
                </li>

                <li>
                    <div class="package-card">

                        <figure class="card-banner">
                            <img src="./image/กรุงเทพ.jpg" alt="Santorini Island's Weekend Vacation" loading="lazy">
                        </figure>

                        <div class="card-content">

                            <h3 class="h3 card-title">เที่ยวกรุงเทพฯ2วัน1คืน แนะนำสถานที่ท่องเที่ยวล่าสุดสำหรับคนขี้เกียจ</h3>

                            <p class="card-text">
                                กรุงเทพฯ 2 วัน 1 คืน ล่องเรือดินเนอร์กลางแม่น้ำกับสไมล์ริเวอร์ไซด์ ครูซ และที่พักโรงแรมหรูใจกลางเยาวราช
                            </p>

                            <ul class="card-meta-list">

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="time"></ion-icon>

                                        <p class="text">2D/1N</p>
                                    </div>
                                </li>

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="people"></ion-icon>

                                        <p class="text">2 คน</p>
                                    </div>
                                </li>

                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>

                                        <p class="text">กรุงเทพ</p>
                                    </div>
                                </li>

                            </ul>

                        </div>

                        <div class="card-price">

                            <div class="wrapper">

                                <p class="reviews">(1850 ถูกใจ)</p>

                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                            </div>

                            <p class="price">
                                3,000 บาท
                                <span>ค่าใช้จ่าย</span>
                            </p>

                            <button class="btn btn-secondary">อ่านเพิ่มเติม</button>

                        </div>

                    </div>
                </li>

            </ul>

            <button class="btn btn-primary">ดูทริปทั้งหมด</button>

        </div>
    </section>





    <!-- 
        - #GALLERY
      -->

    <section class="gallery" id="gallery">
        <div class="container">

            <p class="section-subtitle">อัลบั้มรูปถ่าย</p>

            <h2 class="h2 section-title">รูปถ่ายจากนักท่องเที่ยว</h2>

            <p class="section-text">
                Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.
            </p>

            <ul class="gallery-list">

                <li class="gallery-item">
                    <figure class="gallery-image">
                        <img src="./image/album1.jpeg" alt="Gallery image">
                    </figure>
                </li>

                <li class="gallery-item">
                    <figure class="gallery-image">
                        <img src="./image/Ban-Rak-Thai.webp" alt="Gallery image">
                    </figure>
                </li>

                <li class="gallery-item">
                    <figure class="gallery-image">
                        <img src="./image/allbum3.webp" alt="Gallery image">
                    </figure>
                </li>

                <li class="gallery-item">
                    <figure class="gallery-image">
                        <img src="./image/album4.jpeg" alt="Gallery image">
                    </figure>
                </li>

                <li class="gallery-item">
                    <figure class="gallery-image">
                        <img src="./image/flower-garden1200x630.webp" alt="Gallery image">
                    </figure>
                </li>

            </ul>

        </div>
    </section>








    <!-- 
    - #GO TO TOP
  -->

    <a href="#top" class="go-top" data-go-top>
        <ion-icon name="chevron-up-outline"></ion-icon>
    </a>





    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>