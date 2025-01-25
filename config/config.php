<?php
    session_start();
    $conn = mysqli_connect("127.0.0.1", "root", "", "kchat");

    function checkConnected() {
        if(isset($_SESSION["userNumber"]))
            header('location: chat.html');
    }

    function nombreAleatoire1() {
        return rand(1, 100);
      }
