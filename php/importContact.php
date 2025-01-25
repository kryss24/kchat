<?php 
    include "../config/config.php";
    $query = mysqli_query($conn, "SELECT * FROM contact WHERE (emetNum = '" . $_SESSION["userNumber"] . "' OR destNum = '" . $_SESSION["userNumber"] . "')");
    $resultats = mysqli_fetch_all($query);
    $resultats[] = $_SESSION["userNumber"];
    header('Content-Type: application/json');
    echo json_encode($resultats);//session_destroy();