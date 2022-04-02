<?php 
  $action="giaovien";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action)
  {
      case "giaovien":
        include "View/giaovien.php";
        break;
      case "update": 
        include "View/updategiaovien.php";
        break;
      case "importGV":
        $uploadfile=$_FILES['upload']['tmp_name'];
        require 'PHPExcel1/Classes/PHPExcel.php';
        require_once 'PHPExcel1/Classes/PHPExcel/IOFactory.php';
        $objExcel=PHPExcel_IOFactory::load($uploadfile);
        foreach($objExcel->getWorksheetIterator() as $worksheet)
        {
          $highestrow=$worksheet->getHighestRow();
          for($row=0;$row<=$highestrow;$row++)
          {
            $magv=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
            $tengv=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
            $user=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
            $pass=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
            $role=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
            $cryt=md5($pass);
            $db = new giaovien($magv,$tengv,$user,$cryt,$role);
            if($magv != '')
            {
              $db->insertGiaoVien($magv,$tengv,$user,$cryt,$role);
              echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
            }
          }
        }
        break;
      case "deleteGV":
        if (isset($_GET['maGV'])) {
          $magv= $_GET['maGV'];
          $db= new giaovien();
          $db -> deleteGV($magv);
          echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
        }
        break;
      case "update_gv":
          $magv =$_POST['maGV'] ;
          $tengv = $_POST['tenGV'];
          $user = $_POST['user'];
          $pass = $_POST['pass'];
          $role = $_POST['role'];
          function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
          $magvs=$tengvs=$users=$passwd="";
          $magvErr=$tengvErr=$userErr=$passErr="";
          if($_SERVER['REQUEST_METHOD']=='POST')
          {
              if(empty($magv)){
                  $magvErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $magvs=test_input($magv);
                  if(!preg_match('/^[\d]{9}$/',$magvs)){
                      $magvErr="<h6>Sai định dạng mã giáo viên</h6>";
                  }
              }
              if(empty($tengv)){
                $tengvErr="<h6>Không được bỏ trống</h6>";
              }
              else{
                  $tengvs=test_input($tengv);
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
              if(!$magvErr && !$tengvErr && !$userErr && !$passErr)
              {
                $cryt=md5($passwd);
                $db= new giaovien();
                $db->updateGV($magvs,$tengvs,$users,$cryt,$role);
                echo '<script> alert ("Update thông tin giáo viên thành công")</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
              }
          }
          include "View/updategiaovien.php";
          break;
  }
?>