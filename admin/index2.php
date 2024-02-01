<?php
    session_start();
    include "db_conn.php";

    $lastUserID = "";
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wise trip | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
                <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Wisetrip</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard </h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-camera"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">กิจกรรม</span>
                                    <span class="info-box-number">133 กิจกรรม</span>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-utensils"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ร้านอาหาร</span>
                                    <span class="info-box-number">101 ร้าน</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-location-pin"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">สถานที่ท่องเที่ยว</span>
                                    <span class="info-box-number">145 แห่ง</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ผู้ใช้</span>
                                    <span class="info-box-number">36 คน</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Table of Users</h5>
                                    <a class="btn btn-primary" style="margin-left: 20px;" href="register.php" role="button">New User</a>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                            </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="#" class="dropdown-item">Users</a>
                                                        <a href="#" class="dropdown-item">Activities</a>
                                                        <a href="#" class="dropdown-item">Restaurant</a>
                                                        <a href="#" class="dropdown-item">Scenery</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">

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
                                                                // ...
                                                                $resultsPerPage = 5; // กำหนดจำนวนข้อมูลต่อหน้า
                                                                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                                                $startFrom = ($currentPage - 1) * $resultsPerPage; // คำนวณหาตำแหน่งเริ่มต้นของข้อมูลในหน้าปัจจุบัน

                                                                // แก้ไข SQL เพื่อใช้กับ LIMIT ในการแบ่งหน้า
                                                                $sql = "SELECT * FROM users WHERE status=1 LIMIT $startFrom, $resultsPerPage";
                                                                $result = $conn->query($sql);

                                                                if (!$result) {
                                                                    die("Invalid query: " . $conn->error);
                                                                }

                                                                while ($row = $result->fetch_assoc()) {

                                                                echo    "
                                                                            <tr>
                                                                                <td>{$row['userID']}</td>
                                                                                <td>{$row['first_last_name']}</td>
                                                                                <td>{$row['username']}</td>
                                                                                <td>{$row['password']}</td>
                                                                                <td>{$row['lineid']}</td>
                                                                                <td>{$row['birthdate']}</td>
                                                                                <td>
                                                                                    <a class='btn btn-primary btn-sm' href='edit.php?userID={$row['userID']}'>Edit</a>
                                                                                    <a class='btn btn-danger btn-sm' href='delete.php?userID={$row['userID']}'>Delete</a>
                                                                                </td>
                                                                            </tr>
                                                                        ";
                                                                }

                                                                // สร้าง pagination
                                                                $totalPagesSql = "SELECT COUNT(*) AS total FROM users WHERE status=1";
                                                                $totalPagesResult = $conn->query($totalPagesSql);
                                                                $totalRows = $totalPagesResult->fetch_assoc()['total'];
                                                                $totalPages = ceil($totalRows / $resultsPerPage);

                                                                echo "
                                                                <nav aria-label='Page navigation example'>
                                                                    <ul class='pagination'>
                                                                        <li class='page-item'><a class='page-link' href='?page=1'>First</a></li>
                                                                        <li class='page-item " . ($currentPage == 1 ? 'disabled' : '') . "'>
                                                                            <a class='page-link' href='" . ($currentPage > 1 ? "?page=" . ($currentPage - 1) : "#") . "'>Previous</a>
                                                                        </li>
                                                                ";

                                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                                    echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                                                }

                                                                echo "
                                                                        <li class='page-item " . ($currentPage == $totalPages ? 'disabled' : '') . "'>
                                                                            <a class='page-link' href='" . ($currentPage < $totalPages ? "?page=" . ($currentPage + 1) : "#") . "'>Next</a>
                                                                        </li>
                                                                        <li class='page-item'><a class='page-link' href='?page=$totalPages'>Last</a></li>
                                                                    </ul>
                                                                </nav>
                                                                ";
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                   
                                                    <!-- ... ส่วนของ HTML ... -->

                                            </div>
                                        
                                        </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Table of Activities</h5>
                                    <a class="btn btn-primary" style="margin-left: 20px;" href="register.php" role="button">New Activities</a>


                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                            </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="#" class="dropdown-item">Users</a>
                                                        <a href="#" class="dropdown-item">Activities</a>
                                                        <a href="#" class="dropdown-item">Restaurant</a>
                                                        <a href="#" class="dropdown-item">Scenery</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">

                                                    <table class="table">
                                                        <thread>
                                                            <tr>
                                                                <th>activitiesID</th>
                                                                <th>activitiesname</th>
                                                                <th>seneryID</th>
                                                                <th>timeLength_activities</th>
                                                                <th>price_activities</th>
                                                                <th>activitiesType</th>
                                                                <th>activities_Latitude</th>
                                                                <th>activities_Longitude</th>
                                                                <th>lineid</th>
                                                                <th>phone_activities</th>
                                                                <th>sub_type_activities</th>
                                                                <th>activitiesDistance</th>
                                                            </tr>
                                                        </thread>
                                                        <tbody>                                                   

                                                            <!-- ... ส่วนของ HTML ... -->

                                                            <?php
                                                                // ...
                                                                $resultsPerPage = 10; // กำหนดจำนวนข้อมูลต่อหน้า
                                                                $currentPage = isset($_GET['page2']) ? (int)$_GET['page2'] : 1;
                                                                $startFrom = ($currentPage - 1) * $resultsPerPage; // คำนวณหาตำแหน่งเริ่มต้นของข้อมูลในหน้าปัจจุบัน

                                                                // แก้ไข SQL เพื่อใช้กับ LIMIT ในการแบ่งหน้า
                                                                $sql = "SELECT * FROM activities WHERE 1 LIMIT $startFrom, $resultsPerPage";
                                                                $result = $conn->query($sql);

                                                                if (!$result) {
                                                                    die("Invalid query: " . $conn->error);
                                                                }

                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "
                                                                    <tr>
                                                                        <td>$row[activitiesID]</td>
                                                                        <td>$row[activitiesname]</td>
                                                                        <td>$row[seneryID]</td>
                                                                        <td>$row[timeLength_activities]</td>
                                                                        <td>$row[price_activities]</td>
                                                                        <td>$row[activitiesType]</td>
                                                                        <td>$row[activities_Latitude]</td>
                                                                        <td>$row[activities_Longitude]</td>
                                                                        <td>$row[lineid]</td>
                                                                        <td>$row[phone_activities]</td>
                                                                        <td>$row[sub_type_activities]</td>
                                                                        <td>$row[activitiesDistance]</td>
                                                                        <td>
                                                                            <a class='btn btn-primary btn-sm' href='edit.php?activitiesID=$row[activitiesID]'>Edit</a>
                                                                            <a class='btn btn-danger btn-sm' href='delete.php?activitiesID=$row[activitiesID]'>Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    ";
                                                                }

                                                                // สร้าง pagination
                                                                $totalPagesSql = "SELECT COUNT(*) AS total FROM activities WHERE 1";
                                                                $totalPagesResult = $conn->query($totalPagesSql);
                                                                $totalRows = $totalPagesResult->fetch_assoc()['total'];
                                                                $totalPages = ceil($totalRows / $resultsPerPage);

                                                                echo "
                                                                <nav aria-label='Page navigation example'>
                                                                    <ul class='pagination'>
                                                                        <li class='page-item'><a class='page-link' href='?page2=1'>First</a></li>
                                                                        <li class='page-item " . ($currentPage == 1 ? 'disabled' : '') . "'>
                                                                            <a class='page-link' href='" . ($currentPage > 1 ? "?page2=" . ($currentPage - 1) : "#") . "'>Previous</a>
                                                                        </li>
                                                                ";

                                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                                    echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page2=$i'>$i</a></li>";
                                                                }

                                                                echo "
                                                                        <li class='page-item " . ($currentPage == $totalPages ? 'disabled' : '') . "'>
                                                                            <a class='page-link' href='" . ($currentPage < $totalPages ? "?page2=" . ($currentPage + 1) : "#") . "'>Next</a>
                                                                        </li>
                                                                        <li class='page-item'><a class='page-link' href='?page2=$totalPages'>Last</a></li>
                                                                    </ul>
                                                                </nav>
                                                                ";
                                                            ?>

                                                        </tbody>
                                                    </table>
                                        </div>
                                        
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Table of Restaurant</h5>
                                    <a class="btn btn-primary" style="margin-left: 20px;" href="register.php" role="button">New Restaurant</a>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                            </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="#" class="dropdown-item">Users</a>
                                                        <a href="#" class="dropdown-item">Activities</a>
                                                        <a href="#" class="dropdown-item">Restaurant</a>
                                                        <a href="#" class="dropdown-item">Scenery</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">

                                                    <table class="table">
                                                        <thread>
                                                            <tr>
                                                                <th>restaurantID</th>
                                                                <th>restaurantname</th>
                                                                <th>restaurant_Latitude</th>
                                                                <th>restaurant_Longitude</th>
                                                                <th>phone_restaurant</th>
                                                                <th>facebook</th>
                                                                <th>pricerange</th>
                                                                <th>provinceID</th>
                                                                <th>districtID</th>
                                                                <th>sub_districtID</th>
                                                                <th>open_time</th>
                                                                <th>close_time</th>
                                                                <th>closed_day</th>
                                                                <th>status</th>
                                                                <th>restaurantType</th>
                                                                <th>sub_type_restaurant</th>
                                                                <th>restaurantDistance</th>
                                                            </tr>
                                                        </thread>
                                                        <tbody>                                                           
                                                            <!-- ... ส่วนของ HTML ... -->

                                                            <?php
                                                            // ...
                                                            $resultsPerPage = 10; // กำหนดจำนวนข้อมูลต่อหน้า
                                                            $currentPage = isset($_GET['page3']) ? (int)$_GET['page3'] : 1;
                                                            $startFrom = ($currentPage - 1) * $resultsPerPage; // คำนวณหาตำแหน่งเริ่มต้นของข้อมูลในหน้าปัจจุบัน

                                                            // แก้ไข SQL เพื่อใช้กับ LIMIT ในการแบ่งหน้า
                                                            $sql = "SELECT * FROM restaurant WHERE 1 LIMIT $startFrom, $resultsPerPage";
                                                            $result = $conn->query($sql);

                                                            if (!$result) {
                                                                die("Invalid query: " . $conn->error);
                                                            }

                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "
                                                                    <tr>

                                                                        <td>$row[restaurantID]</td>
                                                                        <td>$row[restaurantname]</td>
                                                                        <td>$row[restaurant_Latitude]</td>
                                                                        <td>$row[restaurant_Longitude]</td>
                                                                        <td>$row[phone_restaurant]</td>
                                                                        <td>$row[facebook]</td>
                                                                        <td>$row[pricerange]</td>
                                                                        <td>$row[provinceID]</td>
                                                                        <td>$row[districtID]</td>
                                                                        <td>$row[sub_districtID]</td>
                                                                        <td>$row[open_time]</td>
                                                                        <td>$row[close_time]</td>
                                                                        <td>$row[closed_day]</td>
                                                                        <td>$row[status]</td>
                                                                        <td>$row[restaurantType]</td>
                                                                        <td>$row[sub_type_restaurant]</td>
                                                                        <td>$row[restaurantDistance]</td>
                                                                        <td>
                                                                            <a class='btn btn-primary btn-sm' href='edit.php?restaurantID=$row[restaurantID]'>Edit</a>
                                                                            <a class='btn btn-danger btn-sm' href='delete.php?restaurantID=$row[restaurantID]'>Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    ";
                                                            }

                                                            // สร้าง pagination
                                                            $totalPagesSql = "SELECT COUNT(*) AS total FROM restaurant WHERE 1";
                                                            $totalPagesResult = $conn->query($totalPagesSql);
                                                            $totalRows = $totalPagesResult->fetch_assoc()['total'];
                                                            $totalPages = ceil($totalRows / $resultsPerPage);

                                                            echo "
                                                            <nav aria-label='Page navigation example'>
                                                                <ul class='pagination'>
                                                                    <li class='page-item'><a class='page-link' href='?page3=1'>First</a></li>
                                                                    <li class='page-item " . ($currentPage == 1 ? 'disabled' : '') . "'>
                                                                        <a class='page-link' href='" . ($currentPage > 1 ? "?page3=" . ($currentPage - 1) : "#") . "'>Previous</a>
                                                                    </li>
                                                            ";

                                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                                echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page3=$i'>$i</a></li>";
                                                            }

                                                            echo "
                                                                    <li class='page-item " . ($currentPage == $totalPages ? 'disabled' : '') . "'>
                                                                        <a class='page-link' href='" . ($currentPage < $totalPages ? "?page3=" . ($currentPage + 1) : "#") . "'>Next</a>
                                                                    </li>
                                                                    <li class='page-item'><a class='page-link' href='?page3=$totalPages'>Last</a></li>
                                                                </ul>
                                                            </nav>
                                                            ";
                                                            ?>

                                                        </tbody>
                                                    </table>
                                        </div>
                                        
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Table of Scenery</h5>
                                    <a class="btn btn-primary" style="margin-left: 20px;" href="register.php" role="button">New Scenery</a>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                            </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="#" class="dropdown-item">Users</a>
                                                        <a href="#" class="dropdown-item">Activities</a>
                                                        <a href="#" class="dropdown-item">Restaurant</a>
                                                        <a href="#" class="dropdown-item">Scenery</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <table class="table">
                                                        <thread>
                                                            <tr>
                                                                <th>sceneryID</th>
                                                                <th>sceneryname</th>
                                                                <th>timeLength_scenery</th>
                                                                <th>price_scenery</th>
                                                                <th>sceneryType</th>
                                                                <th>scenery_Latitude</th>
                                                                <th>scenery_Longitude</th>
                                                                <th>lindID</th>
                                                                <th>phone_scenery</th>
                                                                <th>provinceID</th>
                                                                <th>sub_type_scenery</th>
                                                                <th>sceneryDistance</th>
                                                            </tr>
                                                        </thread>
                                                        <tbody>                                                  
                                                            <!-- ... ส่วนของ HTML ... -->

                                                            <?php
                                                            // ...
                                                            $resultsPerPage = 10; // กำหนดจำนวนข้อมูลต่อหน้า
                                                            $currentPage = isset($_GET['page4']) ? (int)$_GET['page4'] : 1;
                                                            $startFrom = ($currentPage - 1) * $resultsPerPage; // คำนวณหาตำแหน่งเริ่มต้นของข้อมูลในหน้าปัจจุบัน

                                                            // แก้ไข SQL เพื่อใช้กับ LIMIT ในการแบ่งหน้า
                                                            $sql = "SELECT * FROM scenery WHERE 1 LIMIT $startFrom, $resultsPerPage";
                                                            $result = $conn->query($sql);

                                                            if (!$result) {
                                                                die("Invalid query: " . $conn->error);
                                                            }

                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "
                                                                        <tr>

                                                                            <td>$row[sceneryID]</td>
                                                                            <td>$row[sceneryname]</td>
                                                                            <td>$row[timeLength_scenery]</td>
                                                                            <td>$row[price_scenery]</td>
                                                                            <td>$row[sceneryType]</td>
                                                                            <td>$row[scenery_Latitude]</td>
                                                                            <td>$row[scenery_Longitude]</td>
                                                                            <td>$row[lindID]</td>
                                                                            <td>$row[phone_scenery]</td>
                                                                            <td>$row[provinceID]</td>
                                                                            <td>$row[sub_type_scenery]</td>
                                                                            <td>$row[sceneryDistance]</td>
                                                                            <td>
                                                                                <a class='btn btn-primary btn-sm' href='edit.php?sceneryID=$row[sceneryID]'>Edit</a>
                                                                                <a class='btn btn-danger btn-sm' href='delete.php?sceneryID=$row[sceneryID]'>Delete</a>
                                                                            </td>
                                                                        </tr>
                                                                        ";
                                                            }

                                                            // สร้าง pagination
                                                            $totalPagesSql = "SELECT COUNT(*) AS total FROM scenery WHERE 1";
                                                            $totalPagesResult = $conn->query($totalPagesSql);
                                                            $totalRows = $totalPagesResult->fetch_assoc()['total'];
                                                            $totalPages = ceil($totalRows / $resultsPerPage);

                                                            echo "
                                                            <nav aria-label='Page navigation example'>
                                                                <ul class='pagination'>
                                                                    <li class='page-item'><a class='page-link' href='?page4=1'>First</a></li>
                                                                    <li class='page-item " . ($currentPage == 1 ? 'disabled' : '') . "'>
                                                                        <a class='page-link' href='" . ($currentPage > 1 ? "?page4=" . ($currentPage - 1) : "#") . "'>Previous</a>
                                                                    </li>
                                                            ";

                                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                                echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page4=$i'>$i</a></li>";
                                                            }

                                                            echo "
                                                                    <li class='page-item " . ($currentPage == $totalPages ? 'disabled' : '') . "'>
                                                                        <a class='page-link' href='" . ($currentPage < $totalPages ? "?page4=" . ($currentPage + 1) : "#") . "'>Next</a>
                                                                    </li>
                                                                    <li class='page-item'><a class='page-link' href='?page4=$totalPages'>Last</a></li>
                                                                </ul>
                                                            </nav>
                                                            ";
                                                            ?>

                                                        </tbody>
                                                    </table>
                                        </div>
                                        
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col -->

                
        </div>
        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">

                </div>
                <!-- /.table-responsive -->
            </div>

        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->


    </div>
    <!-- /.row -->
    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>