<?php 
    require_once("../../database/helper.php");
    session_start();
    if(!isset($_SESSION['username'])){
        session_destroy();
        header("Location: ../login/login.php");
        die();
    }

    if(isset($_POST['data']) ){
        $data = trim($_POST['data']);
        $sql = "SELECT * FROM major WHERE majorID like '%{$data}%' or name like '%{$data}%'";
        $result = executeResult($sql);
        if(count($result) !== 0 ){
            $i = 1;
            foreach($result as $major){
               ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $major['name'] ?></td>
                    <td><?php echo $major['majorID'] ?></td>
                    <td><?php echo $major['quality']?></td>
                    <td><?php echo $major['block']?></td>
                    <td class="cot"><?php if ($major['status']) echo ("Kích hoạt");
                            else echo("Ẩn");
                    ?></td>
                    <td>
                        <a href="./edit-major.php?majorID=<?php echo $major['majorID']?>" class='edit-btn' 
                        name='edit-btn'><i class='las la-pen'></i></a>
                        <a href="./delete_major.php?majorID=<?php echo $major['majorID']?>" class='delete-btn' 
                        name='delete-btn'><i class='las la-trash-alt'></i></a>
                    </td>
                </tr>
                                                        

                <?php
            }
        }
    }
?>