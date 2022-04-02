<?php 
  $action="sinhvien";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action)
  {
      case "sinhvien":
        include "View/sinhvien.php";
        break;
      case "importSV":
            $uploadfile=$_FILES['uploadfile']['tmp_name'];
            require 'PHPExcel/Classes/PHPExcel.php';
            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
    
            $objExcel=PHPExcel_IOFactory::load($uploadfile);
            foreach($objExcel->getWorksheetIterator() as $worksheet)
            {
            $highestrow=$worksheet->getHighestRow();
            for($row=0;$row<=$highestrow;$row++)
            {
              $mahs=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
              $tenhs=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
              $diachi=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
              $email=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
              $user=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
              $pass=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
              $malop=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
              $cryt=md5($pass);
              $db = new sinhvien ($mahs,$tenhs,$diachi,$email,$user,$cryt,$malop);
              if($mahs!='')
              {
                $db->insertUser($mahs,$tenhs,$diachi,$email,$user,$cryt,$malop);
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=sinhvien&act=sinhvien&maLop='.$malop.'"/>';
              }
            }
          }
        break;  
        case "deleteSV":
          if (isset($_GET['maHS'])) {
               $maHS = $_GET['maHS'];
               $db= new sinhvien();
               $db -> deleteSV($maHS);
               echo '<script> alert ("Update thông tin sinh viên thành công")</script>';
               echo '<meta http-equiv="refresh" content="0; url=./index.php?action=lop&act=lop"/>';
               }
               break;
        case "update": 
          include "View/updatesinhvien.php";
          break;
        case "update_sv":
          $mahs =$_POST['maHS'] ;
          $tenhs = $_POST['tenHS'];
          $diachi = $_POST['diachi'];
          $email = $_POST['email'];
          $user = $_POST['user'];
          $pass = $_POST['pass'];
          $lop = $_POST['maLop'];
          function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
          $masvs=$tensvs=$diachis=$emails=$users=$passwd="";
          $masvErr=$tensvErr=$diachiErr=$emailErr=$userErr=$passErr="";
          if($_SERVER['REQUEST_METHOD']=='POST')
          {
              if(empty($mahs)){
                  $masvErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $masvs=test_input($mahs);
                  if(!preg_match('/^[\d]{9}$/',$masvs)){
                      $masvErr="<h6>Sai định dạng mã sinh viên</h6>";
                  }
              }
              if(empty($tenhs)){
                $tensvErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $tensvs=test_input($tenhs);
              }
              if(empty($diachi)){
                $diachiErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $diachis=test_input($diachi);
              }
              //email
              if(empty($email)){
                $emailErr="<h6 class='ms-3'>Email không được rỗng</h6>";
              }
              else{
                $emails=test_input($email);
                if(!filter_var($emails,FILTER_VALIDATE_EMAIL))
                {
                  $emailErr="<h6 class='ms-3'>Sai định dạng email</h6>";
                }
              }
              if(empty($user)){
                  $userErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $users=test_input($user);
                  if(!preg_match('/^[a-z]{1,50}$/',$users)){
                    $userErr="<h6>Sai định dạng tên tài khoản</h6>";
                }
              }
              if(empty($pass)){
                  $passErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $passwd=test_input($pass);
              }
              if(!$masvErr && !$tensvErr && !$diachiErr && !$emailErr && !$userErr && !$passErr)
              {
                $db= new sinhvien();
                $cryt=md5($passwd);
                $db->updateSV($masvs,$tensvs,$diachis,$emails,$users,$cryt,$lop);
                echo '<script> alert ("Update thông tin sinh viên thành công")</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=sinhvien&act=sinhvien&maLop='.$lop.'"/>';
              }
          }
          include "View/updatesinhvien.php";
          break;
        

  }
?>