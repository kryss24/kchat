<?php
include "../config/config.php";
$name = $_GET['name'];
$tel = $_GET['contact'];
$tel = "+" . $tel;
$tel = str_replace(" ", "", $tel);

$query = mysqli_query($conn, "SELECT * FROM contact WHERE (destNum = '$tel' AND emetNum = '" . $_SESSION["userNumber"] . "') OR (emetNum = '$tel' AND destNum = '" . $_SESSION["userNumber"] . "')");
$resultats = mysqli_num_rows($query);
if (mysqli_num_rows($query) == 0) {
    $query = mysqli_query($conn, "INSERT INTO contact VALUES(0, '" . $_SESSION["userNumber"] . "', '$tel', 'null', '$name');");
    $resultats = mysqli_insert_id($conn);
} else {
    $query = mysqli_query($conn, "UPDATE contact SET emetName = '".$name."' WHERE emetNum = '".$tel."' AND destNum = '" . $_SESSION["userNumber"] . "'");
    $resultats = "success";
}



header('Content-Type: application/json');
echo json_encode($resultats);