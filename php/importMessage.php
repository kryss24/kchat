<?php
    include "../config/config.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM message WHERE contactId = $id");
    $resultats = mysqli_fetch_all($query);
    $resultats[] = "+237697102596";
    header('Content-Type: application/json');
    echo json_encode($resultats);