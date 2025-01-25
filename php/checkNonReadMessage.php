<?php
    include "../config/config.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM message WHERE contactId = $id AND etat = 0 AND emetNum <> '" . $_SESSION["userNumber"] . "'");
    $resultats = mysqli_num_rows($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);