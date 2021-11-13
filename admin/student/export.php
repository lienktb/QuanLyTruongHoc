<?php 
    require_once("../../database/helper.php");
    require_once("../Classes/PHPExcel.php");
    session_start();
    if(!isset($_SESSION['username'])){
        session_destroy();
        header("Location: ../login/login.php");
        die();
    }

    if(isset($_POST['export'])){
        $xls = new PHPExcel;
        $xls->setActiveSheetIndex(0);
        $sheet = $xls->getActiveSheet()->setTitle("hello");

        $rowCount = 1;
        $sheet->setCellValue('A'.$rowCount, 'STT');
        $sheet->setCellValue('B'.$rowCount, 'Họ tên');
        // $sheet->setCellValue('C'.$rowCount, 'Giới tính');
        $sheet->setCellValue('D'.$rowCount, 'Ngày sinh');
        $sheet->setCellValue('E'.$rowCount, 'Địa chỉ');
        $sheet->setCellValue('F'.$rowCount, 'Số điện thoại');
        $sheet->setCellValue('G'.$rowCount, 'Email');

        $sql = "SELECT * FROM register";
        $result = executeResult($sql);
        if(count($result) > 0){
            foreach($result as $student){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount, $rowCount-1);
                $sheet->setCellValue('B'.$rowCount, $student['name']);
                // $sheet->setCellValue('C'.$rowCount, $student['name']);
                $sheet->setCellValue('D'.$rowCount, $student['birthday']);
                $sheet->setCellValue('E'.$rowCount, $student['address']);
                $sheet->setCellValue('F'.$rowCount, $student['phone']);
                $sheet->setCellValue('G'.$rowCount, $student['email']);
            }
                $objWriter = new PHPExcel_Writer_Excel2007($xls);
                $filename = 'student.xlsx';
                $objWriter->save($filename);

                header('Content-Disposition: attachment; filename="'.$filename.'"');
                header('Content-Type: application/vnd.ms-excel');
                // header('Content-Length: ' . filesize($filename));
                // header('Content-Transfer-Encoding: binary');
                // header('Cache-Control: must-revalidate');
                // header('Pragma: no-cache');
                readfile($filename);
                return;
            
        }
    }
?>