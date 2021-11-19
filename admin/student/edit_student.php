<?php
    require_once("../../database/helper.php");
    session_start();

    if(!isset($_SESSION['username'])){
        session_destroy();
        header ("Location: ../login/login.php");
        die();
    }
    
    
    if(isset($_POST['add-btn'])){
        $registerID = $_POST['registerID'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $score = $_POST['score'];
        $highschool = $_POST['highschool'];
        $address = $_POST['address'];
        $majorID = $_POST['majorID'];
        $status = $_POST['status'];
        $check = "SELECT * FROM (SELECT * FROM register WHERE registerID != '$registerID') AS A WHERE phone = '$phone' or email ='$email'";
    
        $exist = executeResult($check);

        echo $registerID;
        if(count($exist) > 0){       
            echo "<div class='thatbai'></div>"; 
        }else{
            
            $sql = "UPDATE register SET name = '$name', birthday='$birthday', phone='$phone',
            email='$email', score='$score', highschool='$highschool',
            address='$address', majorID = '$majorID', status='$status' WHERE registerID = '$registerID'";
            
            $checkAdd = execute($sql);
            if($checkAdd){
                $_SESSION['edit-success'] = true;
                header("Location: ./student.php");
            }else{
                echo "error"; die();
            }
            
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
            <h2><span class="las la-clinic-medical"></span> <span>MPT EDUCATION</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../index.php" ><span class="las la-home"></span>
                    <span>Trang Chủ</span></a>
                </li>
                <li>
                    <a href="./major.php"><span class="las la-book"></span></span>
                    <span>Ngành Học</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-book-medical"></span>
                    <span>Tuyển Sinh</span></a>
                </li>
                <li>
                    <a href="../student/student.php" class="active"><span class="las la-graduation-cap"></span>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h5>Sửa thí sinh</h5>
                <?php 
                    if(isset($_GET['registerID'])){
                        $id = $_GET['registerID'];
                        $sql = "SELECT register.name, major.name as mname,  major.majorID, register.registerID, highschool,
                        birthday, score, address, email, phone, register.status FROM major, register 
                        WHERE major.majorID = register.majorID AND register.registerID = '$id'";
                        $result = executeResult($sql);
                        if(count($result) > 0){
                            foreach($result as $student){
                    
                ?>
                <div class="form-row">
                    <input type="text" class="form-control" placeholder="ID" name="registerID" value="<?php echo $student['registerID']?>" style="display:none">
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Họ tên</label>
                    <input type="text" class="form-control" placeholder="Họ tên" name="name" value="<?php echo $student['name']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Ngày sinh</label>
                    <input type="date"  class="form-control" name="birthday" placeholder="Ngày Sinh" value="<?php echo $student['birthday']?>">
                </div>
                   
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id = "phone" name="phone" placeholder="Số điện thoại" value="<?php echo $student['phone']?>">
                        <span class="message" role="alert">
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id = "email" name="email" placeholder="Email" value="<?php echo $student['email']?>">
                        <span class="message1" role="alert">
                        </span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="score">Điểm thi THPT</label>
                        <input type="text" class="form-control" name="score" placeholder="Điểm thi THPT" value="<?php echo $student['score']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="highschool">Trường THPT</label>
                      <input type="text" class="form-control" name="highschool" placeholder= "Trường THPT"value = "<?php echo $student['highschool']?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Tỉnh/Thành phố </label>
                        <input type="text" class="form-control" name="address" placeholder="Tỉnh/Thành phố" value="<?php echo $student['address']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="majorID">Ngành học đăng ký</label>
                      <select class='custom-select' name = "majorID">
                        
                            <?php 
                                $sql = "SELECT * FROM major WHERE status = 1";
                                $result = executeResult($sql);
                                if(count($result) >0){
                                    foreach($result as $major){  
                                        if($major['majorID'] === $student['majorID'])                  
                                            echo "<option value='$major[majorID]' seleted>{$major['name']}</option>";
                                        else 
                                            echo  "<option value='$major[majorID]' >{$major['name']}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                  </div>
                
                   
                <div class="form-row">
                  <div class="form-group col-md-6">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="custom-select">        
                            <option value="1" selected>Đã xác nhận</option>
                            <option value="0">Chưa xử lý</option>
                        </select>
                  </div>
                </div>
           
                  <input type="submit" value="Sửa" class="btn add-btn" style="width: 100px" name="add-btn">
                  <span class="message2" role="alert">
                  </span>
            </form>
            <?php }
                }
            }   
            ?>
            </div>
        </main>
    </div>
   
    <script src="../../frontend/assets/js/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(document).ready(function(){
            console.log("1");
            
            if($("div").hasClass("thatbai")){
                Swal.fire({
                    icon: 'error',
                    title: 'Thất bại...',
                    text: 'Email hoặc số điện thoại đã được đăng kí!'
                });
                $(this).remove();
            }            
        })
    </script>
</body>
</html>