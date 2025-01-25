<?php
include "config/config.php";
checkConnected();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        fieldset {
            width: 100%;
            font-size: 25px;
            color: rgb(122, 255, 122);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
            text-align: center;
            font-style: italic;
            font-variant: small-caps;
        }
        .btn-grp {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <form action="connexion.php" method="post">
        <fieldset class="mb-3">Inscription</fieldset>
        <div class="row g-2 mb-3">
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select" name="country" id="floatingSelectGrid">
                        <option value="+237">+237 Cameroun</option>
                        <option value="+1">+1 Amerique</option>
                    </select>
                    <label for="floatingSelectGrid">Select your Country</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputGrid" name="tel" required>
                    <label for="floatingInputGrid">Phone Number</label>
                </div>
            </div>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGroup1" name="psw" required>
                <label for="floatingInputGroup1">Password</label>
            </div>
        </div>
        <div class="col-12 btn-grp">
            <button class="btn btn-primary" type="submit">Connect</button>
        </div>
        You already yave an account? Click <a href="">here</a> to SignIn
    </form>

    <script href="style/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

<?php
    if(isset($_POST["country"])) {
        $country = $_POST["country"];
        $phone = $_POST["tel"];
        $psw = $_POST["psw"];
        $phone = $country . "" . $phone;
        $query = mysqli_query($conn, "SELECT * FROM users WHERE phoneNumber = '$phone' && password = '$psw'");
        if(mysqli_num_rows($query) > 0){
            $_SESSION["userNumber"] = $phone;
            header('location: chat.html');
        }
        echo "<script>alert('Erro occured, please contact the administrator')</script>";
    }
?>

</html>