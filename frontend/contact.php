<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
 
    <title>Company</title>
</head>
<body>
    
    <?php 
      include("./includes/header.php");
    ?>
    <div class="contact-info">
        <div class="container">
            <h3>THÔNG TIN LIÊN HỆ</h3>
            <table>
                <tr>
                    <th>Phòng ban</th>
                    <th>Chức năng</th>
                    <th class="phone">Liên hệ</th>
                </tr>
                <tr>
                    <td>Tuyển sinh</td>
                    <td>Tư vấn, hướng dẫn và giải đáp những thắc mắc của học sinh, phụ huynh trong công tác tuyển sinh.</td>
                    <td class="phone">(024) 07243621</td>
                </tr>
                <tr>
                    <td>Giáo vụ</td>
                    <td>Giải quyết các vấn đề liên quan đến thủ tục hành chính sv, thủ tục học vụ, kí túc xá, tài chính, chương trình đào tạo, kết quả học tập, đăng kí tín chỉ, lịch thi,...</td>
                    <td class="phone">(024) 73081723</td>
                </tr>
                <tr>
                    <td>Thư viện</td>
                    <td>Quản lý, cung cấp và giải đáp các thắc mắc về tài liệu học tập của sinh viên đại học FPT: Giáo trình, tài liệu tham khảo, tạp chí, sách nghiên cứu,</td>
                    <td class="phone">(024) 87326726</td>
                </tr>
                <tr>
                    <td>Công tác sinh viên</td>
                    <td>Quản lý các hoạt động, sự kiện, chương trình đoàn thể của sinh viên và kết nối doanh nghiệp với nhà trường qua các hội thảo, ký kết hợp tác,….</td>
                    <td class="phone">(024) 87239873</td>
                </tr>
            </table>

            <form action="">
                <h5>Liên hệ ngay</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Họ Tên *</label>
                        <input type="text" class="form-control" placeholder="Họ Tên">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Email *</label>
                      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Số Điện Thoại *</label>
                        <input type="number" class="form-control" placeholder="Số Điện Thoại">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Địa Chỉ *</label>
                      <input type="text" class="form-control" placeholder="Địa chỉ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message">Thông điệp</label> 
                    <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                  <button type="submit" class="btn sub-comment">Gửi</button>
            </form>
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
</body>
</html>