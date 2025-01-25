<?php 
    include "../config/config.php";
    $query = mysqli_query($conn, "SELECT * FROM users WHERE phoneNumber = '" . $_SESSION["userNumber"] . "'");
    $resultats = mysqli_fetch_all($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);