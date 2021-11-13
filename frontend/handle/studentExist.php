<?php 
    require_once("../../database/helper.php");

    if(isset($_POST['data']) && $_POST['data'] !== ''){
        $phone = trim($_POST['data']);
        $check = "SELECT * FROM register WHERE phone = '$phone' ";
        $exist = executeResult($check);

        if(count($exist) > 0) {
            echo "Số điện thoại đã được đăng ký học. Vui lòng nhập số điện thoại khác.";
        }else{
           echo "";
        }
    }
    
    if(isset($_POST['email']) && $_POST['email'] !== ''){
        $email = $_POST['email'];
        $check = "SELECT * FROM register WHERE email = '$email' ";
        $exist = executeResult($check);

        if(count($exist) > 0) {
            echo "Email đã được đăng ký học. Vui lòng nhập email khác.";
        }else{
            echo "";
        }
    }

?>