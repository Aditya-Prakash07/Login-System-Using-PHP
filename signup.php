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
    <div class="container">
      <h1 class="text-center mt-3">Signup to our Website!</h1>
      <form action="/signup.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label"
            >Username</label
          >
          <input
            type="email"
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
        <button type="submit" class="btn btn-primary">Signup</button>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>