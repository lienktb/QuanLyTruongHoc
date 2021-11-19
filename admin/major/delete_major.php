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
        $imageOld = '';
        $query = "SELECT * FROM major WHERE majorID = '$majorID'";
        $major = executeResult($query);
        $imageOld = $major[0]['image'];
        $sql = "DELETE FROM major WHERE majorID = '$majorID'";
        unlink('uploads/'.$imageOld);
        $result = execute($sql);
        header("Location: ./major.php");
    }
   
?>