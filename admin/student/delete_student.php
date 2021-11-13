<?php 
    require_once("../../database/helper.php");
    session_start();
    if(!isset($_SESSION['username'])){
        session_destroy();
        header("Location: ../login/login.php");
        die();
    }
    if(isset($_POST['registerID'])){
        $id = $_POST['registerID'];
        $sql = "SELECT * FROM register WHERE registerID = '$id' AND status = 1";
        $result = executeResult($sql);
        if(count($result) > 0){
            echo 0;
        }else{
            $sql2 = "DELETE FROM register WHERE registerID = '$id'";
            $result = execute($sql2);
            echo $result;
        }
        
    }
?>