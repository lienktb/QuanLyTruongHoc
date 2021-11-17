<?php
    require_once("../database/helper.php");
    session_start();

    if(!isset($_SESSION['username'])){
        session_destroy();
        header ("Location: ./login/login.php");
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css?v=<?php echo time(); ?>">
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
                    <a href="./index.php" class="active"><span class="las la-home"></span>
                    <span>Trang Chủ</span></a>
                </li>
                <li>
                    <a href="../admin/major/major.php"><span class="las la-book"></span></span>
                    <span>Ngành Học</span></a>
                </li>
                <li>
                    <a href="./admissions/admissions.php"><span class="las la-book-medical"></span>
                    <span>Tuyển Sinh</span></a>
                </li>
                <li>
                    <a href="../admin/student/student.php"><span class="las la-graduation-cap"></span>
                    <span>Thí Sinh</span></a>
                </li>   
                <li>
                    <a href="./chart/chart.php"><span class="las la-chart-bar"></span>
                    <span>Thống Kê</span></a>
                </li>              
                <li>
                    <a href="./logout/logout.php"><span class="las la-sign-out-alt""></span>
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
                TRANG CHỦ
            </h3>
            <div class="user-wrapper">
                <img src="./image/avatar.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Admin</h4>

                </div>
            </div>
        </header>
        <br>
        <main>
            <div class="cards">

                <div class="card-single">
                    <div>
                        <h1><?php $sql = "SELECT * FROM register";
                                $result = executeResult($sql);
                                echo count($result);
                            ?></h1>
                        <span>Thí sinh đăng ký</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php $sql = "SELECT * FROM major";
                                $result = executeResult($sql);
                                echo count($result);
                            ?></h1>
                        <span>Ngành học</span>
                    </div>
                    <div>
                        <span class="las la-book"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><h1><?php $sql = "SELECT * FROM register WHERE status=1";
                                $result = executeResult($sql);
                                echo count($result);
                            ?></h1></h1>
                        <span>Nhập học</span>
                    </div>
                    <div>
                        <span class="las la-graduation-cap"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><h1><?php $sql = "SELECT SUM(major.quality) as quality FROM major WHERE status =1";
                                $result = executeResult($sql);
                                if($result >0){
                                    foreach($result as $quality) print_r($quality['quality']);
                                }
                                
                            ?></h1></h1>
                        <span>Chỉ tiêu</span>
                    </div>
                    <div>
                        <span class="lab la-wpforms"></span>
                    </div>
                </div>
            </div>
            <!--Tabla-->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Top 10 thí sinh điểm cao nhất</h3>          
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Họ tên</td>
                                            <td>Số điện thoại</td>
                                            <td>Địa chỉ</td>
                                            <td>Tổng điểm</td>
                                            <td>Ngày sinh</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM register ORDER BY score DESC LIMIT 10 ";
                                        $student = executeResult($sql);
                                        $i = 1;
                                        if(count($student) > 0){
                                            foreach($student as $item){
                                                echo "
                                                <tr>
                                                    <td>$i</td>
                                                    <td>{$item['name']}</td>
                                                    <td>{$item['phone']}</td>
                                                    <td>{$item['address']}</td>
                                                    <td>{$item['score']}</td>
                                                    <td>{$item['birthday']}</td>
                                                </tr>
                                                ";
                                                $i++;
                                            }
                                        }
                                        

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
  
</body>

</html>