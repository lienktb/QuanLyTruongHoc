<?php 
  require_once("../database/helper.php");
   
  if(isset($_GET['majorID'])){ 
    $id = $_GET['majorID'];
    $sql = "SELECT * FROM major WHERE majorID = '$id'";
    $result = executeResult($sql);
    if(count($result) > 0){ 
      foreach($result as $major) { 
            
?>
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

    <div class="direct">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Ngành học</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $major['name']?></li>
            </ol>
          </nav>
    </div>


    <div class="content-major">
        <div class="main">
            
            <h3 class="title"><?php echo $major['name']?></h3>
            <p class="date">15/10/2021</p>
            <div class="card">
                <img class="card-img-top" src="../admin/major/uploads/<?php echo $major['image']?>" alt="<?php echo $major['image']?>">
                <?php echo "$major[learning]";
              }
            }
          }?>
                
            </div>

            <div class="comment">
                <h5>3 Bình Luận</h5><hr class="my-4">
                <div class="list-comment">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="./assets/images/822711_user_512x512.png" width="70px">
                                <div class="media-body">
                                  <h5 class="mt-0 username">user13452</h5>
                                  <p class="date"><i>01/04/2021</i></p>
                                  <p class="comment-detail">Em muốn tư vấn về học phí của trường, và chương trình học ngành công nghệ thông tin ạ.</p>
                                </div>
                              </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="./assets/images/822711_user_512x512.png" width="70px">
                                <div class="media-body">
                                  <h5 class="mt-0 username">anhnguyen</h5>
                                  <p class="date"><i>12/04/2021</i></p>
                                  <p class="comment-detail">Số điện thoại của em: 0972348273. Tư vấn cho em với ạ!</p>
                                </div>
                              </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="./assets/images/822711_user_512x512.png" width="70px">
                                <div class="media-body">
                                  <h5 class="mt-0 username">phuong23</h5>
                                  <p class="date"><i>23/05/2021</i></p>
                                  <p class="comment-detail">Cho em hỏi ngành này sẽ học những học phần gì ạ, cơ hội việc làm khi ra trường như nào ạ?</p>
                                </div>
                              </div>
                        </li>
                        
                      </ul>
                </div>
                <h5>Bình Luận</h5>
                <p>Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu *</p>
                <form action="">
                    <div class="form-group">
                        <label for="comment">Bình Luận</label> 
                        <textarea class="form-control" id="comment" rows="3"></textarea>
                    </div>
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


                      <button type="submit" class="btn btn-primary sub-comment">Gửi Bình Luận</button>
                </form>
            </div>
        </div>
    </div>
    <?php 
      include("./includes/footer.php");
    ?>
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/index.js"></script>
</body>
</html>