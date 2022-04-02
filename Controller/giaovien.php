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
      case "danhsachmon":
        include "View/danhsachmon.php";
        break;
      case "caclopday":
        include "View/caclopday.php";
        break;
      case "danhsachdiem":
        include "View/danhsachdiem.php";
        break;
        //timer
      case "timer":
        include "View/setTimer.php";
        break;
      case "updateTimer":
        include "View/updateTimer.php";
        break;
      case "setTimer":
        $date=$_POST['date'];
        $hour= $_POST['h'];
        $min= $_POST['m'];
        $sec= $_POST['s'];
        $made=$_POST['made'];
        
        $hourErr=$minErr=$dateErr='';
        $hours=$mins=$dates='';
        function test_input($data){
          $data=trim($data);
          // $data=stripslashes($data);//thay \ thành ''
          $data=htmlspecialchars($data);
          return $data;
        }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($date)){
              $dateErr="<h6>* Vui lòng chọn ngày</h6>";
            }
            else{
              $dates=test_input($date);
            }
            if(empty($hour)){
              $hourErr="<h6>* Vui lòng nhập giờ</h6>";
            }else{
              $hours=test_input($hour);
              if(!preg_match('/^(0[0-9]|1[0-9]|2[0-3])$/',$hours))
              {
                $hourErr="<h6>* Giờ trong khoảng từ 00 giờ đến 23 giờ<h6>";
              }
            }
            if(empty($min)){
              $minErr="<h6>* Vui lòng nhập số phút</h6>";
            }else{
              $mins=test_input($min);
              if(!preg_match('/^[0-5][0-9]$/',$mins)){
                $minErr="<h6>Phút trong khoảng 00 phút đến 59 phút</h6>";
              }
            }
            if(!$hourErr && !$minErr && !$dateErr){
              $db=new giaovien();
              $db->insertTimer($date,$hours,$mins,$sec,$made);
              echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
            }
            
          }
        include "View/setTimer.php";
        break;
        
      case "update_timer":
          $id=$_POST['id'];
          $date=$_POST['date'];
          $hour= $_POST['h'];
          $min= $_POST['m'];
          $sec= $_POST['s'];
        $hourErr=$minErr=$dateErr='';
        $hours=$mins=$dates='';
        function test_input($data){
          $data=trim($data);
          // $data=stripslashes($data);//thay \ thành ''
          $data=htmlspecialchars($data);
          return $data;
        }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($date)){
              $dateErr="<h6>* Vui lòng chọn ngày</h6>";
            }
            else{
              $dates=test_input($date);
            }
            if(empty($hour)){
              $hourErr="<h6>* Vui lòng nhập giờ</h6>";
            }else{
              $hours=test_input($hour);
              if(!preg_match('/^(0[0-9]|1[0-9]|2[0-3])$/',$hours))
              {
                $hourErr="<h6>* Giờ trong khoảng từ 00 giờ đến 23 giờ<h6>";
              }
            }
            if(empty($min)){
              $minErr="<h6>* Vui lòng nhập số phút</h6>";
            }else{
              $mins=test_input($min);
              if(!preg_match('/^[0-5][0-9]$/',$mins)){
                $minErr="<h6>Phút trong khoảng 00 phút đến 59 phút</h6>";
              }
            }
            if(!$hourErr && !$minErr && !$dateErr){
              $made= $_GET['made'];
              $db=new giaovien();
              $db->updateTimer($id,$dates,$hours,$mins,$sec,$made);
              echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=updateTimer&made='.$made.'"/>';
            }
            
          }
        include "View/updateTimer.php";
        break;
      //quản lý học sinh
      case "dshocsinh":
          include "View/dshocsinh.php";
          break;
  }
?>