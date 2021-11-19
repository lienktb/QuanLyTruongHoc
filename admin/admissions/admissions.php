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
                       <div class="col-12 col-lg-6">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Nhập thông tin">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary search" type="button" >Tìm kiếm</button>
                                </div>
                            </div>
                            </form>
                       </div>
                       <div class="col-12 col-lg-3">
                          
                       </div>
                       <div class="col-12 col-lg-3">
                            <a href="./add_admission.php" class="btn add-btn" type="button">Thêm thông tin</a>
                       </div>
                   </div>
                

                <div class="contanier ">
                            <div class="table-responsive admission">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Tiêu đề</td>
                                            <td>Nội dung</td>
                                            <td>Tình trạng</td>
                                            <td>Quản lý</td>
                                        </tr>
                                    </thead>
                                    <tbody class="danhsach">
                                        <?php 
                                            $sql = "SELECT * FROM admissions ORDER BY admisID DESC";
                                            $result = executeResult($sql);
                                            $i = 1;
                                            if(count($result) > 0){
                                                foreach($result as $item){ 
                                                    
                                        ?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                <td><?php echo $item['title']?></td>
                                                <td>Bấm xem để xem chi tiết</td>
                                                <td><?php if ($item['status']){
                                                    echo "Kích hoạt";
                                                    }else{echo "Ẩn";}?>
                                                </td>
                                                <td>
                                                    <a href="./detail_admission.php?admisID=<?php echo $item['admisID']?>" class="detail-btn" name="detail-btn"><i class='las la-eye'></i></a>
                                                    <a href='./edit_admission.php?admisID=<?php echo $item['admisID'] ?>' class='edit-btn' name='edit-btn'><i class='las la-pen'></i></a>
                                                    <a href="./delete_admission.php?admisID=<?php echo $item['admisID']?>" class="delete-btn" name = "delete-btn"><i class='las la-trash-alt'></i></a>
                                                </td>
                                            </tr>
                                        <?php }}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                
            </div>
        </main>

    </div>
    <?php 
        if(isset($_SESSION['edit-success']) && $_SESSION['edit-success']){
            $_SESSION['edit-success']= false;
            echo "
                '<div class='edit-success'></div>'
            ";
        }else{
            echo "";
        }
        if(isset($_SESSION['add-success']) && $_SESSION['add-success']){
            $_SESSION['add-success']= false;
            echo "
                '<div class='add-success'></div>'
            ";
        }else{
            echo "";
        }

    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
  
            $('#search').keyup(function(){
                var key = $('#search').val();
                $.post('search_major.php', {
                    data: key
                }, function(data) {
                    $('.danhsach').html(data);
                })
            })
            
            if($("div").hasClass("edit-success")){
                Swal.fire({
                 icon: 'success',
                title: 'Bạn đã sửa thành công!',
                showConfirmButton: false,
                timer: 2000
                })
            }
            if($("div").hasClass("add-success")){
                Swal.fire({
                 icon: 'success',
                title: 'Bạn đã thêm thành công!',
                showConfirmButton: false,
                timer: 2000
                })
            }
      
    </script>
</body>

</html>