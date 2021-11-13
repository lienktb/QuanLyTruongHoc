<?php
require_once("../../database/helper.php");
session_start();

if (isset($_SESSION['username'])) {
  header("Location: ../index.php");
  die();
}
$error = array();
if (isset($_POST['change'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($name)) {
    $error['name'] = "Bạn chưa nhập tên";
  }
  if (empty($email)) {
    $error['email'] = "Bạn chưa nhập email";
  } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
    $error['email'] = "Bạn chưa nhập email";
  }

  if (!$error) {
    $sql = "SELECT * FROM user WHERE name = '$name' AND email = '$email'";
    $result = executeResult($sql);
    if (count($result) > 0) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "UPDATE user SET password = '$password'";
      $result = execute($sql);
      header("Location: ./login.php");
    } else {
      $error['error'] = "Tài khoản không tồn tại.";
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
                <div class="form-group">
                  <label for="email" class="sr-only">Tên đăng nhập</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Mật khẩu mới</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                </div>
                <button name="change" class="btn btn-block login-btn mb-4" type="submit">Xác nhận</button>
              </form>
              <a href="./login.php" class="forgot-password-link">Login</a>
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