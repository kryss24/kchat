<?php
include "../config/config.php";
$action = $_GET['action'];

if ($action == "get") {
    if(isset($_GET["findNumberById"])) {
        $id = $_GET["findNumberById"];
        $query = mysqli_query($conn, "SELECT * FROM contact WHERE idContact=" . $id);
        $resultats = mysqli_fetch_all($query);
    }
}
$resultats[] = $_SESSION["userNumber"];
header('Content-Type: application/json');
echo json_encode($resultats);//session_destroy();