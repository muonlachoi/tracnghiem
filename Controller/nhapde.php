<?php
  $action = "nhapde";
  if (isset($_GET['act'])) {
      $action = $_GET['act'];
  }
  switch ($action) {
      case "nhapde":
          include 'View/nhapde.php';
          break;
      case "dangkydethi":
          $maDe = $_POST['maDe'];
          $maMon = $_POST['maMon'];
          $slch = $_POST['soluongcauhoi'];
          $thoigian = $_POST['thoigian'];
          $kichhoat = $_POST['kichhoat'];
          $maGV = $_POST['maGV'];
          $maLop = $_POST['maLop'];
          $mades=$slchs=$time='';
          $madeErr=$slchErr=$timeErr='';
          function test_input($data){
            $data=trim($data);
            $data=stripslashes($data);//thay \ thành ''
            $data=htmlspecialchars($data);
            return $data;
          }
          if($_SERVER["REQUEST_METHOD"]=="POST")
          {
              if(empty($maDe)){
                  $madeErr="<h6>Mã đề không được rỗng</h6>";
              }
              else{
                  $mades=test_input($maDe);
                  if(!preg_match('/^[\d]{1,3}$/',$mades)){
                      $madeErr="<h6>Sai định dạng đề</h6>";
                  }
              }
              if(empty($slch)){
                  $slchErr="<h6>Số lượng câu hỏi không được rỗng</h6>";
              }
              else{
                  $slchs=test_input($slch);
                  if(!preg_match('/^[0-9]{1,3}$/',$slchs)){
                      $slchErr="<h6>Sai định dạng số câu hỏi</h6>";
                  }
              }
              if(empty($thoigian)){
                  $timeErr="<h6>Thời gian không được rỗng</h6>";
              }
              else{
                  $time=test_input($thoigian);
                  if(!preg_match('/^[0-9]{1,4}$/',$time)){
                      $timeErr="<h6>Vui lòng chỉ nhập số</h6>";
                  }
              }
              if(!$madeErr && !$slchErr && !$timeErr){
                $db = new de();
                $kiemtra = $db->kiemtradethi($maDe);
                if ($kiemtra <= 0) {
                    $db->insertDethi($mades, $maMon, $slchs, $time, $kichhoat, $maGV, $maLop);
                    echo '<script> alert ("Đăng ký đề thi thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien"/>';
                } else {
                    echo '<script> alert ("Mã đề đã tồn tại, Vui lòng chọn mã đề khác")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=nhapde&act=nhapde"/>';
                }
              }
              
          }
          include 'View/nhapde.php';
          break;
      case "nhapcauhoi":
            include "View/nhapcauhoi.php";
            break;
      case "nhapvaocauhoi":
            $mand = $_POST['maND'];
            $noidung = $_POST['cauhoi'];
            $a =$_POST['dapanA'];
            $b = $_POST['dapanB'];
            $c = $_POST['dapanC'];
            $d = $_POST['dapanD'];
            $ketqua =$_POST['ketqua'];
            $made= $_POST['maDe'];
            $db = new cauhoi();
            $kiemcauhoi = $db->kiemCauhoi($noidung,$made);
            $kiemde = $db->kiemMade($made);
            $noidungs=$caua=$caub=$cauc=$caud=$ketquas="";
            $NDErr=$aErr=$bErr=$cErr=$dErr=$KQErr="";
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($noidung)){
                    $NDErr="<h6 class='ms-3'>* Nội dung câu hỏi không được rỗng</h6>";
                }
                else{
                    $noidungs=test_input($noidung);
                }
                if(empty($a)){
                    $aErr="<h6 class='ms-3'>* Câu A không được rỗng</h6>";
                }
                else{
                    $caua=test_input($a);
                }
                if(empty($b)){
                    $bErr="<h6 class='ms-3'>* Câu B không được rỗng</h6>";
                }
                else{
                    $caub=test_input($b);
                }
                if(empty($c)){
                    $cErr="<h6 class='ms-3'>* Câu C không được rỗng</h6>";
                }
                else{
                    $cauc=test_input($c);
                }
                if(empty($d)){
                    $dErr="<h6 class='ms-3'>* Câu D không được rỗng</h6>";
                }
                else{
                    $caud=test_input($d);
                }
                if(empty($ketqua)){
                    $KQErr="<h6 class='ms-3'>* Kết quả không được rỗng</h6>";
                }
                else{
                    $ketquas=test_input($ketqua);
                }
                if(!$NDErr && !$aErr && !$bErr && !$cErr && !$dErr&& !$KQErr)
                {
                    if ($kiemcauhoi > 0) {
                        echo '<script> alert ("Câu hỏi đã tồn tại! Vui lòng nhập câu khác")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=nhapde&act=nhapcauhoi&made='.$_GET['made'].'"/>';
                    } else if ($kiemde == 0) {
                        echo '<script> alert ("Mã đề không tồn tại ! Vui lòng nhập lại")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=nhapde&act=nhapcauhoi&made='.$_GET['made'].'"/>';
                    }
                    else {
                        echo '<script> alert ("Bạn đã hoàn thành công câu hỏi ")</script>';
                        $db->insertCauhoi($noidungs, $caua, $caub, $cauc, $caud, $ketquas, $made);
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=nhapde&act=nhapcauhoi&made='.$_GET['made'].'"/>';
                    }
                }

            }
            // $solannhap=$db->solannhap($made);
            // $socauhoi=$db->socauhoi($made);
            include "View/nhapcauhoi.php";
            break;
  }
?>