<?php 
    require_once("../../database/helper.php");
    session_start();
    if(!isset($_SESSION['username'])){
        session_destroy();
        header("Location: ./login/login.php");
        die();
    }

    if(isset($_POST['key'])){
        $key = trim($_POST['key']);
        $sql = " SELECT * FROM (SELECT register.name, major.name as mname,  major.majorID, register.registerID, 
        birthday, score, address, email, phone, register.status FROM major, register 
        WHERE major.majorID = register.majorID ORDER BY registerID DESC)AS A WHERE name like '%{$key}%' ";
        $result = executeResult($sql);
        if(count($result) !== 0 ){
        //    print_r($result);
            $i = 1;
            foreach($result as $student){
                ?>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $student['name'] ?></td>
                    <td><?php echo $student['phone'] ?></td>
                    <td><?php echo $student['email']?></td>
                    <td><?php echo $student['address']?></td>
                    <td><?php echo $student['score']?></td>
                    <td><?php echo $student['mname']?></td>
                    <td class="cot"><?php if ($student['status']) echo ("Đã xác nhận");
                            else echo("Chưa xử lý");
                    ?></td>
                    <td>
                        <a href='./edit_student.php?registerID=<?php echo $student['registerID']?>' class='edit-btn' 
                        name='edit-btn'><i class='las la-pen'></i></a>
                        <a href='./delete_student.php?registerID=<?php echo $student['registerID']?>' class='delete-btn' 
                        name='delete-btn'><i class='las la-trash-alt'></i></a>
                    </td>
                </tr>
                    
                <?php
            }
        }
    }

    if(isset($_POST['major']) && isset($_POST['status'])){
        $major = isset($_POST['major']) ? $_POST['major'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        
        if($status === "-1" && $major !== '-1'){
            $sql = " SELECT * FROM (SELECT register.name, major.name as mname,  major.majorID, register.registerID, 
            birthday, score, address, email, phone, register.status FROM major, register 
            WHERE major.majorID = register.majorID ORDER BY registerID DESC)AS A WHERE majorID = '$major' ";
        }else if($major === '-1' && $status !== "-1" ){
            $sql = " SELECT * FROM (SELECT register.name, major.name as mname,  major.majorID, register.registerID, 
            birthday, score, address, email, phone, register.status FROM major, register 
            WHERE major.majorID = register.majorID ORDER BY registerID DESC)AS A WHERE status = '$status'";
        }else if($major === '-1' && $status === "-1" ){
            $sql = "SELECT register.name, major.name as mname,  major.majorID, register.registerID, 
            birthday, score, address, email, phone, register.status FROM major, register 
            WHERE major.majorID = register.majorID ORDER BY registerID DESC";
        }
        else{
            $sql = " SELECT * FROM (SELECT register.name, major.name as mname,  major.majorID, register.registerID, 
            birthday, score, address, email, phone, register.status FROM major, register 
            WHERE major.majorID = register.majorID ORDER BY registerID DESC)AS A WHERE majorID = '$major' AND status = '$status'";
        }
       
        $result = executeResult($sql);
        if(count($result) !== 0 ){
        //    print_r($result);
            $i = 1;
            foreach($result as $student){
                ?>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $student['name'] ?></td>
                    <td><?php echo $student['phone'] ?></td>
                    <td><?php echo $student['email']?></td>
                    <td><?php echo $student['address']?></td>
                    <td><?php echo $student['score']?></td>
                    <td><?php echo $student['mname']?></td>
                    <td class="cot"><?php if ($student['status']) echo ("Đã xác nhận");
                            else echo("Chưa xử lý");
                    ?></td>
                    <td>
                        <a href='./edit_student.php?registerID=<?php echo $student['registerID']?>' class='edit-btn' 
                        name='edit-btn'><i class='las la-pen'></i></a>
                        <a href='./delete_student.php?registerID=<?php echo $student['registerID']?>' class='delete-btn' 
                        name='delete-btn'><i class='las la-trash-alt'></i></a>
                    </td>
                </tr>
                    
                <?php
            }
        }
    }


    ?>
 