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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <form action="#" method="post">
        <fieldset>Inscription</fieldset>
        <div class="input-group mb-3">
            <!-- <span class="input-group-text">@</span> -->
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGroup1" name="lname" required>
                <label for="floatingInputGroup1">Last Name</label>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGroup1" name="fname" required>
                <label for="floatingInputGroup1">First Name</label>
            </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGroup1" name="Username">
                <label for="floatingInputGroup1">Username</label>
            </div>
        </div>
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
        <div class="col-12 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12 btn-grp">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        You already yave an account? Click <a href="">here</a> to login
    </form>


</body>

<?php
    if(isset($_GET["lname"])) {
        
    }
?>

</html>

<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->