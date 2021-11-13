<?php
require_once("../database/helper.php");

$checkAdd = 2;
$error = array();
if (isset($_POST['btnRegister'])) {
  $name = $_POST['name'];
  $birthday = $_POST['birthday'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $score = $_POST['score'];
  $highschool = $_POST['highschool'];
  $address = $_POST['address'];
  $majorID = $_POST['majorID'];

  $check = "SELECT * FROM register WHERE phone = '$phone' or email ='$email'";
  $exist = executeResult($check);

  if (empty($name)) {
    $error['name'] = "Bạn chưa nhập tên ";
  }
  if (empty($email)) {
    $error['email'] = "Bạn chưa nhập email";
  } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
    $error['email'] = "Email không đúng định dạng";
  }

  if (empty($phone)) {
    $error['phone'] = "Bạn chưa nhập số điện thoại";
  } else if (!preg_match("/^[0-9]+$/", $phone)) {
    $error['phone'] = "Số điện thoại không hợp lệ";
  }
  if (empty($address)) {
    $error['address'] = "Bạn chưa nhập địa chỉ";
  }
  if (empty($majorID)) {
    $error['major'] = "Bạn chưa nhập ngành học";
  }

  if ($error) {
    $message = "Thông tin không hợp lệ";
  } else if (count($exist) > 0) {
    $message = "Email hoặc số điện thoại đã được đăng ký";
    $checkAdd = 0;
  } else {
    $sql = "INSERT INTO register(name, birthday, phone, email, score, highschool, address, majorID) VALUES
          ('$name', '$birthday', '$phone' , '$email', '$score', '$highschool', '$address', '$majorID')";

    $checkAdd = execute($sql);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">

  <title>Company</title>
</head>

<body>

  <?php
  include("./includes/header.php");
  ?>

  <div class="form-regiter">
    <div class="gradient">
      <div class="content">
        <h2><span>ĐĂNG KÝ</span> TRỰC TUYẾN</h2>
        <p>Bạn vui lòng điền đầu đủ thông tin cá nhân vào bảng đăng ký xét tuyển trực tuyến bên cạnh để cán bộ tư vấn của trường liên hệ với bạn giải đáp các thắc mắc hoàn toàn miễn phí. Chúng tôi sẽ chủ động liên hệ lại với bạn trong vòng 24h kể từ khi nhận được thông tin đăng ký. Lưu ý: Những mục đánh dấu (*) là thông tin bắt buộc phải điền.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <input type="text" class="form-control" name="name" placeholder="Họ Tên *">
          <span><?php echo isset($error['name']) ? $error['name'] : ''; ?></span>
          <input type="date" class="form-control" name="birthday" placeholder="Ngày Sinh">
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Số Điện Thoại *">
          <span class="message" role="alert">
            <span><?php echo isset($error['phone']) ? $error['phone'] : ''; ?></span>
          </span>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email *">
          <span class="message1" role="alert">
            <span><?php echo isset($error['email']) ? $error['email'] : ''; ?></span>

          </span>
          <input type="text" class="form-control" name="score" placeholder="Điểm thi THPT *">
          <input type="text" class="form-control" name="highschool" placeholder="Trường THPT">
          <input type="text" class="form-control" name="address" placeholder="Tỉnh/Thành Phố *">
          <span><?php echo isset($error['address']) ? $error['address'] : ''; ?></span>
          <select class='custom-select' name="majorID">
            <option selected>Ngành học đăng ký</option>
            <?php
            $sql = "SELECT * FROM major WHERE status = 1";
            $result = executeResult($sql);
            if (count($result) > 0) {
              foreach ($result as $major) {
                echo "
                              <option value='$major[majorID]'>{$major['name']}</option>                
                          ";
              }
            }
            ?>
          </select>
          <span><?php echo isset($error['major']) ? $error['major'] : ''; ?></span>
          <button type="submit" name="btnRegister" class="btn mb-2">Đăng Ký</button>
          <span class="message2" role="alert">

          </span>
        </form>
      </div>
    </div>
  </div>
  <?php
  include("./includes/footer.php");
  ?>
  <script src="./assets/js/jquery-3.6.0.min.js"></script>
  <script src="./assets/js/jquery-3.6.0.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="assets/js/index.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <?php
  if ($checkAdd == 1) {
    echo "<div class='thanhcong'></div>";
  } else if ($checkAdd == 0) {
    echo "<div class='thatbai'></div>";
  } else {
    echo "";
  }
  ?>
  <script>
    $(document).ready(function() {
      $('#phone').keyup(function() {
          var phone = $('#phone').val();
          $.post("./handle/studentExist.php", {
            data: phone
          }, function(data) {
            $('.message').html(data);
          });
        }),

        $('#email').keyup(function() {
          var email = $('#email').val();
          $.post("./handle/studentExist.php", {
            email: email
          }, function(message) {
            $('.message1').html(message);
          });
        })
      if ($("div").hasClass("thatbai")) {
        Swal.fire({
          icon: 'error',
          title: 'Thất bại...',
          text: 'Email hoặc số điện thoại đã được đăng kí!'
        });
      }
      if ($("div").hasClass("thanhcong")) {
        Swal.fire({
          icon: 'success',
          title: 'Bạn đã đăng ký thành công!',
          showConfirmButton: false,
          timer: 2000
        })
      }

    })
  </script>
</body>

</html>