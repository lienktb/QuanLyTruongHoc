<?php
    require_once("../../database/helper.php");
    session_start();

    if(!isset($_SESSION['username'])){
        session_destroy();
        header ("Location: ../login/login.php");
        die();
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
                    <a href="../major/major.php" ><span class="las la-book"></span></span>
                    <span>Ngành Học</span></a>
                </li>
                <li>
                    <a href="../admissions/admissions.php" class="active"><span class="las la-book-medical"></span>
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
                THÔNG TIN TUYỂN SINH
            </h3>
            <div class="user-wrapper">
                <img src="../image/avatar.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Admin</h4>
                </div>
            </div>
        </header>

        <main>
            <div class="recent-grid">
                
                   <div class="row">
                       
                       <div class="col-12 col-lg-2">
                            <a href="./edit_admissions.php" class="btn btn-info" name="edit-btn" type="button">Sửa thông tin</a>
                       </div>
                       <div class="col-12 col-lg-2">
                            <a href="./delete_admissions.php" class="btn btn-danger" name="delete-btn"type="button">Xoá thông tin</a>
                       </div>
                   </div>
                

                <div class="contanier ">
                    <div class="table-responsive detail">
                        <?php 
                            if(isset($_GET['admisID'])){ 
                            $sql = "SELECT * FROM admissions WHERE admisID = '$_GET[admisID]'";
                            $result = executeResult($sql);
                            $i = 1;
                            if(count($result) > 0){
                                foreach($result as $item){ 
                                    echo "
                                        <h3>{$item['title']}</h3>
                                        <div>{$item['content']}</div>
                                    ";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>