<?php 
require_once("../../database/helper.php");
session_start();

if(!isset($_SESSION['username'])){
    session_destroy();
    header ("Location: ../login/login.php");
    die();
}
 
if(isset($_POST['chartMajor'])){
    $sql = "SELECT majorID, name, COUNT(registerID) AS number FROM 
    (SELECT major.majorID, registerID, major.name FROM major, register WHERE major.majorID = register.majorID) AS A GROUP BY majorID";
    $result = executeResult($sql);
    if(count($result) > 0){
        $data = array();
        foreach($result as $major){
            $data[] = $major;
        }
       
        print json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}



?>