<?php
require_once("../../database/helper.php");
session_start();

if (!isset($_SESSION['username'])) {
    session_destroy();
    header("Location: ../login/login.php");
    die();
}
$error = array();
if (isset($_POST['edit-btn'])) {
    $admisID = $_POST['admisID'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    if (empty($title)) {
        $error['title'] = "Bạn chưa nhập tiêu đề";
    }
    if (empty($content)) {
        $error['content'] = "Bạn chưa nhập nội dung";
    }

    if (!$error) {
        $sql = "UPDATE admissions SET title = '$title', content = '$content', status = '$status' WHERE admisID = '$admisID'";
        $result = execute($sql);
        if ($result > 0) {
            $_SESSION['edit-success'] = true;
        }
        header("Location: ./admissions.php");
    } else {
        $error['error'] = "Lỗi";
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
                    <a href="../index.php"><span class="las la-home"></span>
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
                    <a href="./logout/logout.php"><span class="las la-sign-out-alt""></span>
                    <span>Đăng Xuất</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class=" main-content">
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
            <!--Tabla-->
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <h5>Sửa thông tin tuyển sinh</h5>
                    <?php 
                        if(isset($_GET['admisID'])){
                            $sql = "SELECT * FROM admissions WHERE admisID = '$_GET[admisID]'";
                            $result = executeResult($sql);
                            if(count($result) > 0){
                                foreach($result as $item){ 
                    ?>
                    <input type="text" class="form-control" placeholder="Tiêu đề" name="admisID" value = "<?php echo $item['admisID']?>" style="display:none">
                    <div class="form-group">
                        <label for="majorID">Tiêu đề</label>
                        <input type="text" class="form-control" placeholder="Tiêu đề" name="title" value = "<?php echo $item['title']?>">
                        <span><?php echo isset($error['title']) ? $error['title'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="learning">Nội dung</label>
                        <textarea class="form-control" id="content" rows="5" name="content" value = "<?php echo $item['content']?>"></textarea>
                        <span><?php echo isset($error['content']) ? $error['content'] : '' ?></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Tình trạng</label>
                            <select name="status" class="custom-select">
                                <?php if($item['status']){ ?>
                                    <option value="1" selected>Kích hoạt</option>
                                    <option value="0">Ẩn</option>
                                <?php
                                    }else{ ?>
                                    <option value="1" >Kích hoạt</option>
                                    <option value="0" selected>Ẩn</option>
                                <?php      
                                    }
                                ?>
                               
                            </select>
                        </div>

                    </div>
                    <?php }}}?>
                    <input type="submit" value="Thêm" class="btn add-btn" style="width: 100px" name="edit-btn">
                </form>
            </div>
        </main>
    </div>
</body>

</html>