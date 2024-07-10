<?php 
    include "../config/config.php";
    $query = mysqli_query($conn, "SELECT * FROM users WHERE phoneNumber = '+237697102596'");
    $resultats = mysqli_fetch_all($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);