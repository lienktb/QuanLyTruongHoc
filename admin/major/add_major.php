<?php
    require_once("../../database/helper.php");
    session_start();

    if(!isset($_SESSION['username'])){
        session_destroy();
        header ("Location: ../login/login.php");
        die();
    }
    $error = array();
    if(isset($_POST['add-btn'])){
        $majorID = $_POST['majorID'];
        $name = $_POST['name'];
        $quality = $_POST['quality'];
        $block = $_POST['block'];
        $learning = $_POST['learning'];
        $status = $_POST['status'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image = time().'_'.$image;

        $query = "SELECT * FROM major WHERE majorID = '$majorID' or name = '$name'";
        $result = executeResult($query);
    
        if(empty($majorID)){
            $error['majorID'] = "Bạn chưa nhập mã ngành";
        }
        if(empty($name)){
            $error['name'] = "Bạn chưa nhập tên ngành";
        }
        if($error){
            $message = "Thiếu thông tin";
        }else if(count($result) > 0){
            $error['error'] = "Ngành học đã tồn tại!";
        }else{
            $sql = "INSERT INTO major (majorID, name, quality, block, learning, status, image) VALUES ('$majorID', '$name', '$quality', '$block','$learning', '$status', '$image')";
            $result = execute($sql);
            if($result > 0 ){
                move_uploaded_file($image_tmp, 'uploads/'.$image);
                $_SESSION['add-success'] = true;
            }
            header("Location: ./major.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><span class="las la-clinic-medical"></span> <span>MPT EDUCATION</span></h4>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../index.php" ><span class="las la-home"></span>
                    <span>Trang Chủ</span></a>
                </li>
                <li>
                    <a href="./major.php" class="active"><span class="las la-book"></span></span>
                    <span>Ngành Học</span></a>
                </li>
                <li>
                    <a href="../admissions/admissions.php"><span class="las la-book-medical"></span>
                    <span>Tuyển Sinh</span></a>
                </li>
                <li>
                    <a href="../student/student.php"><span class="las la-graduation-cap"></span>
                    <span>Thí Sinh</span></a>
                </li>   
                <li>
                    <a href="../chart/chart.php"><span class="las la-chart-bar"></span>
                    <span>Thống Kê</span></a>
                </li>              
                <li>
                    <a href="../logout/logout.php"><span class="las la-sign-out-alt""></span>
                    <span>Đăng Xuất</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </h2>
            <h3 class="title">
                NGÀNH HỌC
            </h3>
            <div class="user-wrapper">
                <img src="../image/avatar.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Admin</h4>
                </div>
            </div>
        </header>
        <main>
            <!--Tabla-->
            <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <h5>Thêm ngành học</h5>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="majorID">Mã ngành</label>
                        <input type="text" class="form-control" placeholder="Mã ngành" name="majorID">
                        <span><?php isset($error['majorID']) ?  "Bạn chưa nhập mã ngành!" : ""?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Tên ngành</label>
                        <input type="text" class="form-control" placeholder="Tên ngành" name="name">
                        <span><?php isset($error['name']) ?  "Bạn chưa nhập tên!" : ""?></span>
                    </div>
                   
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="quality">Chỉ tiêu</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Chỉ tiêu" name="quality">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="block">Khối thi</label>
                      <input type="text" class="form-control" placeholder="Khối thi" name="block">
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="learning">Chương trình đào tạo</label> 
                    <textarea class="form-control" id="learning" rows="3" name="learning"></textarea>
                    </div>
                    <tr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="status">Tình trạng</label>
                        <select name="status" class="custom-select">        
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Ẩn</option>
                        </select>                    
                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Hình ảnh</label><br>
                        <input type="file" name= "image">
                       
                    </div>
                </div>
            </tr>
                  <input type="submit" value="Thêm" class="btn add-btn" style="width: 100px" name="add-btn">
            </form>
            </div>
            <span><?php isset($error['error']) ?  "Ngành học đã tồn tại!" : ""?></span>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         if($("div").hasClass("error")){
            Swal.fire({
                icon: 'error',
                title: 'Ngành học đã tồn tại!',
                showConfirmButton: false,
                timer: 2000
            })
            $(".error").remove();
        }
    </script>
</body>
</html>