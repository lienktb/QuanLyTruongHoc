<?php 
    require_once("../database/helper.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <title>Company</title>
</head>
<body>
    <?php 
      include("./includes/header.php");
    ?>
    <a href="#register">
        <div class="banner2">
        </div>
    </a>

    <div class="success">
        <div class="main">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="box">
                        <p><i class="fas fa-desktop"></i></p>
                        <h5>90%</h5>
                        <p>Đi làm từ năm 3</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="box">
                        <p><i class="fas fa-globe-asia"></i></p>
                        <h5>15%</h5>
                        <p>Sinh viên đang làm việc ở nước ngoài</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="box">
                        <p><i class="fas fa-landmark"></i></p>
                        <h5>23 Trường trên thế giới</h5>
                        <p>Liên kết với Đại học MPT</p>
                    </div>
                </div>
                <div class="col-12  col-sm-6 col-lg-3">
                    <div class="box">
                        <p><i class="fas fa-hands-helping"></i></p>
                        <h5>131 Doanh nghiệp</h5>
                        <p>Ký kết hợp tác với Đại học MPT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="majors-intro">
        <div class="main slideanim">
            <h3 class="title"><i>"Với mục tiêu sinh viên Đại học MPT ra trường có đủ khả năng làm việc tại bất cứ đâu trên thế giới"</i></h3>
            
            <div class="row">
                <?php
                    $sql = "SELECT * FROM major WHERE status = 1";
                    $result = executeResult($sql);
                    foreach($result as $item){  
                ?>
                <a href="./majors.php?majorID=<?php echo $item['majorID']?>">
                <div class="col-12 col-sm-6 col-lg-3"> 
                    <div class="card">
                        <img class="card-img-top" src="../admin/major/uploads/<?php echo $item['image']?>" alt="hinhanh">
                        <div class="card-body">
                          <a href=""><h5 class="card-title"><?php echo $item['name']?></h5></a>
                        </div>
                      </div>

                </div>
                </a>
                <?php }?>    
            </div>
        </div>

    </div>

    <div class="register-banner" id="register">
        <div class="gradient">
            <h1>VỚI TRIẾT LÝ GIÁO DỤC HIỆN ĐẠI VÀ GẮN LIỀN VỚI THỰC TẾ, ĐẠI HỌC MPT MONG MUỐN SINH VIÊN SẼ PHÁT HUY ĐƯỢC HẾT NHỮNG TỐ CHẤT VÀ THẾ MẠNH CỦA BẢN THÂN</h1>
            <a class="btn btn-primary btn-lg" href="./register.php" role="button">Đăng ký học</a>
        </div>
    </div>
   
    <div class="info-admisstion">
        <div class="main">
            <h2 class="title">Thông Tin Tuyển Sinh</h2> <hr class="my-4">

            <div class="tab">
                <div class="row">
                    <?php 
                        $sql = "SELECT * FROM admissions ORDER BY admisID";
                        $result = executeResult($sql);
                        
                        if(count($result) > 0){ 
                            $i = 1;
                            foreach($result as $item){ 
                                if($i === 1){
                                    echo ' <div class="col-12 col-sm-4 col-md-4">
                                            <a class="btn active" role="button">'.$item['title'].'</a>
                                        </div>';
                                }else{
                                    echo '
                                    <div class="col-12 col-sm-4 col-md-4">
                                        <a class="btn"  role="button">'.$item['title'].'</a>
                                    </div>';
                                }
                                $i++;
                            }
                            
                        
                    
                    
                    ?>
                    <!-- <div class="col-12 col-sm-4 col-md-4">
                        <a class="btn active" role="button"></a>
                    </div>
                   
                    <div class="col-12 col-sm-4 col-md-4">
                        <a class="btn"  role="button"></a>
                    </div> -->
                </div>

                <div class="content" id="content">
                    <?php 
                        $i = 1;
                        foreach($result as $item){ 
                            if($i === 1){
                                echo '<div class="tab-item checked">'.$item['content'].'</div>';
                            }else{
                                echo '<div class="tab-item">'.$item['content'].'</div>';
                            }
                            $i++;
                        }
                    }
                    ?>
                    <!-- <div class="tab-item checked">
                            <h5 id="list-item-1">II. CHƯƠNG TRÌNH TÍN DỤNG ƯU ĐÃI <br>Đối tượng tham gia chương trình</h5>
                            <p>Các thí sinh trúng tuyển Đại học FPT, có học lực khá, khó khăn về tài chính có nguyện vọng tham gia chương trình Tín dụng ưu đãi, đáp ứng đủ điều kiện đầu vào xét cấp tín dụng. Việc cấp tín dụng chỉ được áp dụng từ khi thí sinh trở thành sinh viên chính thức của Trường.</p>
                            <h5 id="list-item-2">2. Tiêu chí cấp tín dụng</h5>
                            <p>Thí sinh có nguyện vọng tham gia chương trình Tín dụng ưu đãi, có mức sống trung bình trở xuống theo Quyết định số 59/2015/QĐ-TTg của Thủ tướng chính phủ ban hành ngày 19/11/2015, đạt điều kiện sau và vượt qua vòng phỏng vấn của Đại học FPT: Xếp hạng học bạ THPT 2021 đạt Top30 THPT 2021 hoặc Top30 theo học bạ THPT năm 2021 (chứng nhận thực hiện trên trang http://SchoolRank.fpt.edu.vn)</p>
                            <h5 id="list-item-3">3. Thời hạn, hạn mức cấp tín dụng</h5>
                            <p>Thực hiện theo quy định tài chính học bổng, tín dụng đối với sinh viên hệ đại học chính quy Trường Đại học FPT hiện hành:</p>
                            <ul>
                                <li>Các mức tín dụng: 50% – 70% học phí toàn khoá học;</li>
                                <li>Thời hạn cấp tín dụng tối đa 5 năm kể từ ngày nhập học.</li>
                            </ul>
                            <h5 id="list-item-4">4. Hồ sơ đăng ký tham gia chương trình Tín dụng ưu đãi </h5>
                            <p>Ngoài hồ sơ đã nộp khi đăng ký vào Đại học FPT, thí sinh cần nộp thêm các giấy tờ sau:</p>
                            <ul>
                                <li>Đơn đề nghị tham gia chương trình có chữ ký xác nhận của phụ huynh;</li>
                                <li>Các giấy tờ tài liệu giúp nhà trường xác thực hoàn cảnh khó khăn tài chính của gia đình;</li>
                                <li>01 Bản photo hộ khẩu;</li>
                                <li>01 Bản photo hộ khẩu của Người bảo lãnh;</li>
                                <li>01 Bản photo CMND của Người bảo lãnh;</li>
                                <li>01 Giấy Chứng Nhận xếp hạng học sinh THPT năm 2021 thực hiện trên trang http://SchoolRank.fpt.edu.vn.</li>
                            </ul>
                            <h5 id="list-item-5">5. Hồ sơ nhập học chương trình Tín dụng ưu đãi</h5>
                            <p>Ngoài hồ sơ nhập học theo Quy chế tuyển sinh hiện hành của Trường Đại học FPT, thí sinh cần nộp bổ sung các giấy tờ sau:</p>
                            <ul>
                                <li>Các giấy tờ chứng thực (bản gốc) đã nộp khi đăng ký tham gia chương trình Tín dụng ưu đãi;</li>
                                <li>02 Bản Thỏa thuận Tín dụng theo mẫu của Trường Đại học FPT đã có chữ ký của học sinh và người bảo lãnh.</li>
                            </ul>
                       
                    </div>

                    <div class="tab-item">
                        <h5>II. Đối tượng và Phương thức tuyển sinh <br>1. Đối tượng tuyển sinh</h5>
                        <p>Các thí sinh đã tốt nghiệp Trung học Phổ thông hoặc tương đương tính đến thời điểm nhập học, có nguyện vọng theo học tại Trường Đại học FPT.</p>
                        <h5>2. Phương thức tuyển sinh </h5>
                        <p>Các thí sinh có nguyện vọng theo học tại Trường Đại học FPT cần đáp ứng một trong các điều kiện sau:</p>
                        <ul>
                            <li>a. Thuộc diện được xét tuyển thẳng thực hiện theo Quy định của Bộ Giáo dục & Đào tạo;</li>
                            <li>b. Đạt xếp hạng Top50 theo học bạ THPT năm 2021 (chứng nhận thực hiện trên trang http://SchoolRank.fpt.edu.vn). Trường hợp thí sinh chỉ có điểm học bạ lớp 12 ở Việt Nam (lớp 11 học ở nước ngoài), thì điểm lớp 12 sẽ được dùng để xếp hạng (khi nhập SchoolRank điểm lớp 11 nhập giống điểm lớp 12);</li>
                            <li>c. Đạt xếp hạng Top50 theo điểm thi THPT năm 2021 (chứng nhận thực hiện trên trang http://SchoolRank.fpt.edu.vn theo số liệu Đại học FPT tổng hợp và công bố sau kỳ thi THPT 2021) và điểm theo khối xét tuyển đạt từ trung bình trở lên (15*/30 điểm);</li>
                            <li>d. Có chứng chỉ tiếng Anh TOEFL iBT từ 80 hoặc IELTS (Học thuật) từ 6.0 hoặc quy đổi tương đương (áp dụng đối với ngành Ngôn Ngữ Anh); có chứng chỉ tiếng Nhật JLPT từ N3 trở lên (áp dụng đối với ngành Ngôn Ngữ Nhật); có chứng chỉ tiếng Hàn TOPIK cấp độ 4 trong kỳ thi TOPIK II (áp dụng đối với ngành Ngôn Ngữ Hàn Quốc);</li>
                            <li>e. Tốt nghiệp một trong các chương trình sau: Chương trình APTECH HDSE (đối với ngành Công nghệ thông tin); Chương trình ARENA ADIM (đối với chuyên ngành Thiết kế Mỹ thuật số); Chương trình BTEC HND; FUNiX Software Engineering;</li>
                            <li>f. Tốt nghiệp THPT ở nước ngoài;</li>
                            <li>g. Tốt nghiệp Đại học;</li>
                            <li>h. Sinh viên chuyển trường từ các trường đại học thuộc Top 1000 trong 3 bảng xếp hạng gần nhất: QS, ARWU và THE hoặc các trường đạt chứng nhận QS Star 5 sao về chất lượng đào tạo.</li>
                        </ul>
                        <p>Ghi chú: (*) Làm tròn đến hai chữ số thập phân (ví dụ: nếu thí sinh đạt 14,991 đến 14,994 điểm thì làm tròn thành 14,99 điểm; trường hợp từ 14,995 đến 14,999 mới được làm tròn thành 15,00 điểm).</p>
                        <h5>3. Các tổ hợp môn xét tuyển</h5>
                        <p>A01, A00, D00</p>
                        <h5>III. Thủ tục xét tuyển</h5>
                        <p>Thí sinh đủ điều kiện xét tuyển của ĐH FPT có thể nộp hồ sơ đăng ký xét tuyển về trường.</p>
                        <h5>1. Hồ sơ xét tuyển</h5>
                        <ul>
                            <li>Phiếu đăng ký ĐH FPT</li>
                            <li>Bản photo hoặc bản scan CMND;</li>
                            <li>Ảnh 3×4 hoặc bản scan ảnh 3×4;</li>
                            <li>Lệ phí xét tuyển 100,000 VNĐ;</li>
                            <li>Photo/bản scan Học bạ THPT (đối với hồ sơ xét tuyển theo kết quả Học bạ THPT) hoặc 01 bản gốc Giấy chứng nhận kết quả thi THPT 2021 (đối với hồ sơ xét tuyển theo kết quả thi THPT 2021);</li>
                            <li>Giấy chứng nhận xếp hạng học sinh THPT năm 2021 theo kết quả học bạ THPT trên trang http://Schoolrank.fpt.edu.vn;</li>
                            <li>Giấy chứng nhận xếp hạng học sinh THPT năm 2021 theo kết quả thi THPT trên trang http://Schoolrank.fpt.edu.vn;</li>
                            <li>Photo/scan các giấy tờ chứng nhận điều kiện xét tuyển khác (nếu có).</li>
                        </ul>
                        <h5>2. Chính sách ưu tiên xét tuyển</h5>
                        <p>Điểm ưu tiên đối tượng và khu vực thực hiện theo Quy định của Bộ Giáo dục & Đào tạo.</p>
                        <h5>3. Lịch trình xét tuyển</h5>
                        <p>Phương thức xét tuyển theo điểm thi THPT và xét tuyển thẳng: căn cứ theo lịch trình xét tuyển năm 2021 của Bộ Giáo dục & Đào tạo. Các phương thức khác: nhà trường sẽ dừng nhận hồ sơ xét tuyển khi đủ chỉ tiêu.</p>
                    </div> -->

                    
                </div>
            </div>
            
        </div>
    </div>

    <div class="tuvan">
      <div class="content">
          <h2>TƯ VẤN TUYỂN SINH</h2>
          <form action="">
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
              
              <div class="form-group">
                <label for="message">Thông điệp</label> 
                <textarea class="form-control" id="message" rows="3"></textarea>
            </div>

              <button type="submit" class="btn btn-primary sub-comment">Gửi</button>
        </form>
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