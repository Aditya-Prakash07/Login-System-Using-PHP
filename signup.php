<?php
    $showAlert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //Check weather user already exists
    $existSql = "Select * from `users` where username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "User already exists";
    }else{       
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }else{
            $showError = "Password do not match.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Signup Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your account is created successfully, you can login now!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failure!</strong>'. $showError .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    ?>

    <div class="container">
      <h1 class="text-center mt-3">Signup to our Website!</h1>
      <form action="/signup.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label"
            >Username</label
          >
          <input
            type="text"
            maxlength="25"
            class="form-control"
            id="username"
            name="username"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            maxlength="16"
            class="form-control"
            id="password"
            name="password"
          />
        </div>
        <div class="mb-3">
          <label for="cpassword" class="form-label">Confirm Password</label>
          <input
            type="password"
            class="form-control"
            id="cpassword"
            name="cpassword"
          />
          <div id="emailHelp" class="form-text">
            Make sure to enter same password.
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Signup</button>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>