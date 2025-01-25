<?php
    include "../config/config.php";
    $id = $_GET['id'];
    $query2 = mysqli_query($conn, "SELECT * FROM message WHERE contactId = $id");
    if(mysqli_num_rows($query2) > 0 ) {
        while ($row = mysqli_fetch_assoc($query2)) {
            if($_SESSION["userNumber"] != $row['emetNum']) {
                $query = mysqli_query($conn, "UPDATE message SET etat = 1 WHERE contactId = $id AND etat = 0");
            }
        }
    } else {
        $resultats = null;
    }
    header('Content-Type: application/json');
    echo json_encode($resultats);