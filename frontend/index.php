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

    <div class="slider">
      <div id="banner" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li  data-target="#banner" data-slide-to="0" class="active" ></li>
          <li  data-target="#banner" data-slide-to="1" ></li>
          <li  data-target="#banner" data-slide-to="2" ></li>
          </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/images/70143594-education-banner.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/56755948-thin-line-flat-design-banner-for-education-web-page-classical-and-on-line-education-increasing-knowl.jpg" alt="first">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/education-horizontal-typography-banner-set-with-learning-knowledge-symbols-flat-illustration_1284-29493.jpg" alt="third">
         </div>
        </div>
        <a class="carousel-control-prev"  href="#banner" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          
        </a>
        <a class="carousel-control-next"  href="#banner" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          
        </a>
      </div>

    </div>

    <div class="wapper-info">
      <div class="container">
        <div class="row">
        <div class="col-12 col-lg-6" >
          <div class="jumbotron">
            <h1 class="display-4"><span style="color: #f05123;" class="mau">Tại sao 15000+</span> <br>sinh viên lựa chọn <br>Đại học MPT</h1>
            <hr class="my-4">
            <p class="text-info">Đại học MPT hướng tới việc đào tạo sinh viên 1 cách toàn diện. Không chỉ cung cấp cho sinh viên những kiến thức sát với thực tiễn mà Đại học MPT còn trang bị những kỹ năng mềm cần thiết cho sinh viên</p>
             <p class="text-info">Bên cạnh đó nhà trường đặc biệt chú trọng đến kỹ năng ngoại ngữ đã giúp cho sinh viên của Đại học MPT ra trường có thể tự tin làm việc ở bất cứ đâu trên thế giới</p>
            <p class="lead">
              <a class="btn btn-lg" href="./register.php" role="button">Đăng ký học</a>
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6 image">
          <div class="row">
            <div class="col-12 col-sm-7">
              <img src="./assets/images/IMG_4316.jpg" alt="hinh1">
            </div>
            <div class="col-12 col-sm-5">
               <img src="./assets/images/IMG_8817.jpg" alt="hinh2">
        
             
                <img src="./assets/images/MG_6137.jpg" alt="hinh3" class="bottom-img">
             
            </div>    
          </div>
        </div>
      </div>
      </div>
    </div>

    <div class="wapper-news">
      <h1 class="title">Tin Tức</h1> <hr class="my-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/bo-nhiem-bia.jpg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">02/08/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">LỄ CÔNG BỐ QUYẾT ĐỊNH BỔ NHIỆM CÁN BỘ</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-3">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/anh-truong.jpg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">12/07/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Năm học 2020 -2021, tổng kinh phí dành cho học bổng khuyến khích học tập tăng 20% và mức học bổng tăng 10%</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-3">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/anh-bia-covid.jpg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">11/07/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Hỗ trợ sinh viên nội trú vượt khó trong thời gian dịch bệnh Covid kéo dài</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-3">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/thong-bao-ptit.jpg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">11/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Thông báo về kế hoạch giảng dạy – học tập trực tuyến từ ngày 04/05/2021 tại cơ sở đào tạo Hà Nội</a></h5>
              </div>
   
          </div>
         
        </div>
      
      </div>

      <a class="btn btn-lg read-more" href="./news.html" role="button">Xem Thêm</a>
    </div>

    <div class="wapper-news">
      <h1 class="title">Sự Kiện Nổi Bật</h1> <hr class="my-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/244812589_274394474587323_4023016861961199073_n-copy.jpg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">12/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Nghe các LUK-er bật mí bí quyết để du hành đến “nước Anh thu nhỏ”</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-4">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/20211013_Nihongbannerartical.png" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">12/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Chính thức khởi động sân chơi ngoại ngữ hấp dẫn nhất năm – MPT Edu NihongoEng 2021</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-4">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/Ảnh-chụp-Màn-hình-2021-10-14-lúc-09.41.29.png" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">11/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Cuối tuần này sinh viên MPT có hẹn với Music Show: HOLA VIBES</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-4">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/244634523_4380761788677300_8398281254194710051_n.jpeg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">11/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">[The Dialogue] “Phù thủy” truyền thông Lê Quốc Vinh và bài học về Social Media Influencers</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-4">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/Thiết-kế-không-tên-1-scaled.jpg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">11/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">MPTU TALENT SHOW – sự kiện tìm kiếm tài năng quy mô nhất MPT Edu chính thức trở lại</a></h5>
              </div>
   
          </div>
          <div class="col-12 col-md-6 col-lg-4">
        
              <div class="card">
                <a href="./detail.html"><img class="card-img-top" src="./assets/images/243662279_4384132488340230_1438670752204828475_n.jpeg" alt="Card image cap"></a>
                <span class="date"><a href="./detail.html">11/10/2021</a></span>
                <h5 class="card-title"><a href="./detail.html">Đại học MPT Hà Nội “thắng lớn” ở MPT Uni SecAthon 2021</a></h5>
              </div>
   
          </div>
         
      
      </div>

      <a class="btn btn-lg read-more" href="./news.html" role="button">Xem Thêm</a>
    </div>

    <div class="wapper-news">
      <h1 class="title">Chương Trình Đào Tạo</h1> <hr class="my-4">
      <div class="container">
        <div class="majors-intro">
          <div class="main slideanim">
              
              <div class="row">
                  <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                          <a href="./majors.html"> <img class="card-img-top" src="./assets/images/269x269-cong-nghe-thong-tin-v2-1.jpg" alt="image"></a>
                          <div class="card-body">
                            <a href="./majors.html"><h5 class="card-title">Công Nghệ Thông Tin</h5></a>
                          </div>
                        </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                          <a href="./majors.html"><img class="card-img-top" src="./assets/images/269x269-kinh-te-v2-1.jpg" alt="image"></a>
                          <div class="card-body">
                            <a href="./majors.html"><h5 class="card-title">Quản Trị Kinh Doanh</h5></a>
                          </div>
                        </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                          <a href="./majors.html"><img class="card-img-top" src="./assets/images/269x269-ngon-ngu.jpg" alt="image"></a>
                          <div class="card-body">
                            <a href="./majors.html"><h5 class="card-title">Ngôn ngữ Anh</h5></a>
                          </div>
                        </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-3">
                      <div class="card">
                          <a href="./majors.html"><img class="card-img-top" src="./assets/images/269x269-do-hoa-1.jpg" alt="image"></a>
                          <div class="card-body">
                            <a href="./majors.html"><h5 class="card-title">Thiết Kế Đồ Hoạ</h5></a>
                          </div>
                        </div>
                  </div>
              </div>
          </div>
  
      </div>
      </div>
    </div>

    <div class="connect">
      <h1 class="title">Đối tác</h1> <hr class="my-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-4">
            <img src="./assets/images/samsung-logo.jpg">
          </div>
          <div class="col-12 col-lg-4">
            <img src="./assets/images/mig1623687403.png" alt="">
          </div>
          <div class="col-12 col-lg-4">
                <img src="./assets/images/1280px-FTEL_Logo.svg.png" alt="">
          </div>
        </div>
          
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