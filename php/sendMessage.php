<?php
    include "../config/config.php";
    $date = date('Y-m-d');
    $heure = date('H:i');
    $message = $_GET['message'];
    $id = $_GET['id'];
    $query = mysqli_query($conn, "INSERT INTO message VALUES(0, $id, '$message', '$heure', '$date', '". $_SESSION["userNumber"] ."', 0);");
    $resultats = mysqli_insert_id($conn);
    header('Content-Type: application/json');
    echo json_encode($resultats);