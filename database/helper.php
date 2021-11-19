<?php
require_once ("config.php");

// insert, delete, update
function execute ($sql) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result = mysqli_query($conn, $sql);
    if($result){
        return 1;
    }
    return 0;
    mysqli_close($conn);
}
//select
function executeResult ($sql) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result = mysqli_query($conn, $sql);
    $list = [];
    while ($row = $result->fetch_assoc()){
        $list[] = $row;
    } 
    mysqli_close($conn);
    return $list;
}

?>