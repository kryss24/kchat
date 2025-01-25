<?php
    include "../config/config.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM message WHERE contactId = $id");
    $resultats = mysqli_fetch_all($query);
    $resultats[] = $_SESSION["userNumber"];
    // $query2 = mysqli_query($conn, "SELECT * FROM message WHERE contactId = $id");
    // while ($row = mysqli_fetch_assoc($query2)) {
    //     if($_SESSION["userNumber"] != $row['emetNum']) {
    //         $query = mysqli_query($conn, "UPDATE message SET etat = 1 WHERE contactId = $id AND etat = 0");
    //     }
    // }
    header('Content-Type: application/json');
    echo json_encode($resultats);