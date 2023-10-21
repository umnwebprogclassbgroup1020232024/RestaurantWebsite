<?php

    if(empty($_POST['username']) && empty($_POST['password'])){
        die("<center><br><h1 style='color: blue;'>Error: You haven't logged in yet...! </h1><h2>Head to the login page!</h2>");
    }
    else{
        $username = $_POST['username'];
        $password = $_POST['password'];

        include "connection.php";

        $query1 = "SELECT * FROM users WHERE username = '".$username."'";
        $stmt = $conn->query($query1);
        $result = $stmt->fetch();

        if(empty($result)){
            die("<center><br><h1>Error: Username doesn't exist! </h1><h2>Have you created your account?</h2>");
        }
        else{
            if($result['password'] == $password){

                session_start();
                // After successful login, set session variables
                $_SESSION['globalUser'] = $username; // Set the username
                $_SESSION['globalPswd'] = $password; // Set the password or a hashed password


                echo "<center><br /><h1>You have logged in successfully!";
                header("Location: index.php"); // WARNING: Cek lagi sudah bener apa blm biar gak salah redirect
            }
            else{
                die("<center><br /><h1 style='color: blue;'>Error Invalid Password!");
            }
        }
    }

?>