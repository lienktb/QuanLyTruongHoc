<?php
require_once("../../database/helper.php");
session_start();

if (isset($_SESSION['username'])) {
  header("Location: ../index.php");
  die();
}
if (isset($_POST["login"])) {
  $username = $_POST['name'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM user WHERE name = '$username' LIMIT 1";
  $result = executeResult($sql);

  if (count($result) > 0) {
    foreach ($result as $value) {
      if (password_verify($password, $value['password'])) {
        $_SESSION['username'] = $value['name'];
        header("Location: ../index.php");
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../image/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <p class="login-card-description">Admin</p>
              </div>


              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <label for="name" class="sr-only">Tên đăng nhập</label>
                  <input type="name" name="name" id="name" class="form-control" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Mật khẩu</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                </div>
                <button name="login" class="btn btn-block login-btn mb-4" type="submit">Đăng nhập</button>
              </form>
              <a href="./forget.php" class="forgot-password-link">Quên mật khẩu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>