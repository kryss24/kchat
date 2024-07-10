<?php 
    include "../config/config.php";
    $query = mysqli_query($conn, "SELECT * FROM contact, users WHERE emetNum = '+237697102596' AND phoneNumber = destNum");
    $resultats = mysqli_fetch_all($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);