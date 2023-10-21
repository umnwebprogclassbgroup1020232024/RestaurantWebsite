<?php

    // Konek ke db lu.
    try{
        $dsn = "mysql: dbname=todolistapp; host=localhost"; // Ini sama 2 line selanjutnya ganti.
        $user = "root";
        $pswd = "";

        $conn = new PDO($dsn, $user, $pswd);

        $conn->query("USE todolistapp"); // Ganti database
    }
    catch(PDOException $e){
        die("Error Connecting: " . $e->getMessage());
    }

?>