<?php 
    require_once("../../database/helper.php");
    session_start();

    if(!isset($_SESSION['username'])){
        session_destroy();
        header("Location: .login/login.php");
        die();
    }

    if(isset($_GET['majorID'])){
    
        $majorID = $_GET['majorID'];
       
        $sql = "DELETE FROM major WHERE majorID = '$majorID'";
        echo "$sql";
        $result = execute($sql);
        header("Location: ./major.php");
    }
   
?>