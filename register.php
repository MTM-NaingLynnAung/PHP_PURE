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
    <h2 class="">Registration Form</h2>

    <?php

    if (isset($_POST['register'])) {
      echo register();
    }
    ?>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" required name="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" required name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" required name="password">
    </div>
    <div class="form-group">
      <label for="c_password">Confirm Password</label>
      <input type="password" class="form-control" id="c_password" required name="c_password">
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="register">Register</button>
  </form>
</body>

</html>

<?php

function alert($data, $color = "danger")
{
  return "<p class='alert alert-$color'>$data</p>";
}

function register()
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  if ($password == $c_password) {
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name','$email', '$hash_pass')";
    $query = mysqli_query(mysqli_connect('localhost', 'root', 'root', 'php_pure'), $sql);
    if($query){
      header('location:login.php');
    }
  } else {
    return alert("Password and Confirm Password must match");
  }
}
?>
