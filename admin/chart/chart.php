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
                    <a href="../admissions"><span class="las la-book-medical"></span>
                    <span>Tuyển Sinh</span></a>
                </li>
                <li>
                    <a href="../student/student.php" ><span class="las la-graduation-cap"></span>
                    <span>Thí Sinh</span></a>
                </li>   
                <li>
                    <a href="./chart.php" class="active"><span class="las la-chart-bar"></span>
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
                THỐNG KÊ THÍ SINH
            </h3>
            <div class="user-wrapper">
                <img src="../image/avatar.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Admin</h4>
                </div>
            </div>
        </header>

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
            <div class="recent-grid">
                <div class="chart">
                    <canvas id="chartMajor">
                    
                        
                    </canvas>
                </div>

                <div class="chart-score" style="margin-top: 60px">
                    <canvas id="chartScore">

                    </canvas>
                </div>
            </div>
        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <script src="../lib/chart.min.js"></script>

    <script>
        $(document).ready(function(){  
           $.post("./chart_data.php", {chartMajor: "1"},
           function(data){
                var major = JSON.parse(data);
                var labels = []; var number= [];
                for( var i in major){
                    labels.push(major[i].name);
                    number.push(major[i].number);
                    console.log(labels);
                    console.log(number);
                }
                
                
                var bar= document.getElementById('chartMajor').getContext('2d'); 
                var barGraph = new Chart(bar, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Thống kê thí sinh đăng ký theo ngành học',
                            data: number,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)'
                            ],
                            hoverBackgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                });
           }) ;

           $.post("./chart_data.php", 
                {chartScore: "1"}, 
                function(data){
                    var score = JSON.parse(data);
    
                    var labels = []; var number = [];
                    for( var i in score){
                        labels.push(score[i].name);
                        number.push(score[i].score);
                        console.log(labels);
                        console.log(number);
                    }
                    var bar= document.getElementById('chartScore').getContext('2d'); 
                    var barGraph = new Chart(bar, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Thống kê điểm trung bình theo ngành học',
                                data: number,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        },
                    });
                })
        })

    </script>
</body>

</html>