<?php
require_once("../../database/helper.php");
session_start();

if (!isset($_SESSION['username'])) {
    session_destroy();
    header("Location: ../login/login.php");
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
                    <a href="../index.php"><span class="las la-home"></span>
                        <span>Trang Chủ</span></a>
                </li>
                <li>
                    <a href="../major/major.php"><span class="las la-book"></span></span>
                        <span>Ngành Học</span></a>
                </li>
                <li>
                    <a href="../admissions/admissions.php"><span class="las la-book-medical"></span>
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
                THÍ SINH ĐĂNG KÝ HỌC
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
                                <input type="text" class="form-control" id="search" name="search" placeholder="Nhập tên thí sinh hoặc email">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary search" type="button">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-lg-3">
                        <form action="./export.php" method="POST">

                            <input type="submit" class="btn btn-secondary" name="export" value="Xuất Excel">
                        </form>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="./add_student.php" class="btn add-btn" type="button">Thêm thí sinh</a>
                    </div>
                </div><br>
               
                    <div class="form-row row">
                        <div class="col-md-4">

                            <select class='custom-select majorSelect' name="majorID">
                                <option selected value="-1">Ngành học đăng ký...</option>
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
                        </div>
                        <div class="col-md-4">

                            <select class='custom-select statusSelect' name="majorID">
                                <option selected value="-1">Nhập học...</option>
                                <?php

                                echo "
                                    <option value='1'>Đã xác nhận</option>
                                    <option value='0'>Chưa xử lý</option>
                                ";

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="contanier ">
                            <div class="table-responsive student">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Họ tên</td>
                                            <td>Số điện thoại</td>
                                            <td>Email</td>
                                            <td>Địa chỉ</td>
                                            <td>Điểm thi</td>
                                            <td>Ngành đăng ký</td>
                                            <td>Nhập học</td>
                                            <td style="height:100%">Quản lý</td>
                                        </tr>
                                    </thead>
                                    <tbody class="danhsach">
                                        <?php
                                        if (isset($_GET['search']) &&  $_GET['search'] !== '') {
                                            $search = $_GET['search'];
                                            $sql = " SELECT * FROM (SELECT register.name, major.name as mname,  major.majorID, register.registerID, 
                                            birthday, score, address, email, phone, register.status FROM major, register 
                                            WHERE major.majorID = register.majorID ORDER BY registerID DESC)AS A WHERE name like '%{$search}%' ";
                                        } else {
                                            $sql = "SELECT register.name, major.name as mname,  major.majorID, register.registerID, birthday, score, address, email, phone, register.status FROM major, register WHERE major.majorID = register.majorID ORDER BY registerID DESC";
                                        }
                                        $result = executeResult($sql);
                                        if (count($result) > 0) {
                                            //    print_r($result);
                                            $i = 1;
                                            foreach ($result as $student) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $student['name'] ?></td>
                                                    <td><?php echo $student['phone'] ?></td>
                                                    <td><?php echo $student['email'] ?></td>
                                                    <td><?php echo $student['address'] ?></td>
                                                    <td><?php echo $student['score'] ?></td>
                                                    <td><?php echo $student['mname'] ?></td>
                                                    <td class="cot"><?php if ($student['status']) echo ("Đã xác nhận");
                                                                    else echo ("Chưa xử lý");
                                                                    ?></td>
                                                    <td>
                                                        <a href='./edit_student.php?registerID=<?php echo $student['registerID'] ?>' class='edit-btn' name='edit-btn'><i class='las la-pen'></i></a>
                                                        <button href='' onclick="deleteStudent(<?php echo $student['registerID'] ?>)" class='delete-btn' name='delete-btn'><i class='las la-trash-alt'></i></button>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        
                    
                

                </div>
        </main>

    </div>
    <?php
        if (isset($_SESSION['edit-success']) && $_SESSION['edit-success']) {
            $_SESSION['edit-success'] = false;
            echo "
                <div class='edit-success'></div>
            ";
        } else {
            echo "";
        }
        if (isset($_SESSION['add-success']) && $_SESSION['add-success']) {
            $_SESSION['add-success'] = false;
            echo "
                <div class='add-success'></div>
            ";
        } else {
            echo "";
        }

    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteStudent(id) {
            $.post("delete_student.php", {
                registerID: id
            }, function(data) {

                if (data === "1") {
                    icon = "success";
                    data = "Xoá thành công";
                } else {
                    icon = "error";
                    data = "Không thể xoá thí sinh";
                }
                Swal.fire({
                    title: data,
                    icon: icon,
                    showConfirmButton: false,
                    timer: 2000
                })
                setInterval('location.reload()', 2500);
            })

        }
        $(document).ready(function() {
            $("#search").keyup(function() {
                var key = $("#search").val();
                $.post("search_student.php", {
                    key: key
                }, function(data) {
                    $(".danhsach").html(data);
                });
            })
            if ($("div").hasClass("edit-success")) {
                Swal.fire({
                    icon: 'success',
                    title: 'Bạn đã sửa thành công!',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
            if ($("div").hasClass("add-success")) {
                Swal.fire({
                    icon: 'success',
                    title: 'Bạn đã thêm thành công!',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
            $('.majorSelect').change(function() {
                var major = $('.majorSelect').val();
                var status = $('.statusSelect').val();
                console.log(major);
                $.post("./search_student.php", {
                    major: major,
                    status: status
                }, function(data) {
                    $(".danhsach").html(data);
                })
            });

            $('.statusSelect').change(function() {
                var major = $('.majorSelect').val();
                var status = $('.statusSelect').val();
                console.log(status);
                $.post("./search_student.php", {
                    status: status,
                    major: major
                }, function(data) {
                    $(".danhsach").html(data);
                })
            })
        })
    </script>
</body>

</html>