<?php 
    require_once("../../database/helper.php");
    session_start();
    if(!isset($_SESSION['username'])){
        session_destroy();
        header("Location: ../login/login.php");
        die();
    }

    if($_POST['admisID']){
        
    }
?>