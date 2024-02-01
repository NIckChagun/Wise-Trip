<?php

    session_start(); 

    include "db_conn.php";

        if (isset($_POST['email']) && isset($_POST['password'])) {

            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $email = validate($_POST['email']);
            $password = validate($_POST['password']);

            if (empty($email)) {
                header("Location: login.php?error=ใส่ Email ด้วยจ้าาา");
                // header("Location: login.php?error=Email is required");
                exit();

            }else if (empty($password)) {
                header("Location: login.php?error=ใส่ Password ด้วยจ้าาา");
                // header("Location: login.php?error=Password is required");
                exit();

            }else {
                $sql = "SELECT * FROM users WHERE username = '$email' AND password = '$password' ";

                $result = mysqli_query($conn, $sql);
                $userID = "";

                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['username'] === $email && $row['password'] === $password) {
                        $_SESSION['email'] = $row['username'];
                        $_SESSION['first_last_name'] = $row['first_last_name'];
                        $_SESSION['userID'] = $row['userID'];
                        $userID = $row['userID'];
                        $_SESSION['userID'] = $userID;
                        header("location: welcome.php");
                        
                    
                        // echo "Login Successful";

                    }else {
                        header("Location: login.php?error=Email or Password ผิดนะ!");
                        // header("Location: login.php?error=Try again!");
                        exit();
                    }    

                }else {
                    header("Location: login.php?error=Email or Password ผิดนะ!");
                    // header("Location: login.php?error=Try again!");
                    exit();
                }
            }

        } else {
            header("Location: login.php");
            exit();
        }

?>