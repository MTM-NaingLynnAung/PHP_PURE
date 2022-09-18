<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP PURE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="float-end col-3" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <form method="POST" class="col-3 m-auto mt-5">
    <h2 class="">Login Form</h2>
    <?php

    if (isset($_POST['login'])) {
      echo login();
    }
    ?>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary mt-3" name="login">Login</button>
  </form>
</body>

</html>

<?php

function alert($data, $color = "danger")
{
  return "<p class='alert alert-$color'>$data</p>";
}

function login()
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users where email='$email'";
  $query = mysqli_query(mysqli_connect('localhost', 'root', 'root', 'php_pure'), $sql);
  $row = mysqli_fetch_assoc($query);
  if (!$row || $email == '' || $password == '') {
    return alert("Email or Password is incorrect");
  } else {
    if (!password_verify($password, $row['password'])) {
      return alert("Email or Password is incorrect");
    } else {
      session_start();
      $_SESSION['user'] = $row;
      header("location:profile.php");
    }
  }
}
?>