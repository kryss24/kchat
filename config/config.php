<?php
    session_start();
    $conn = mysqli_connect("127.0.0.1", "root", "", "kchat");

    function checkConnected() {
        if(isset($_SESSION["userNumber"]))
            header('location: chat.html');
    }