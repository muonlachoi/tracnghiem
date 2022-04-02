<?php
    $action='lop';
    if(isset($_GET['act']))
    {
        $action=$_GET['act'];
    }
    switch($action)
    {
        case "lop":
            include  "View/lop.php";
            break;
        case "themlop":
            include "View/themlop.php";
            break;
        case "update":
            include "View/updatelop.php";
            break;
        case "dangky_lop":
            $malop=$_POST['maLop'];
            $tenlop=$_POST['tenLop'];
            $siso=$_POST['siso'];  
            $db= new lop();
            $kiemtra = $db->kiemtramaLop($malop);
            $kt = $db->kiemtraTenLop($tenlop);
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $malops=$tenlops=$sisos="";
            $malopErr=$tenlopErr=$sisoErr="";
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($malop)){
                    $malopErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $malops=test_input($malop);
                    if(!preg_match('/^[\d]{1,10}$/',$malops)){
                        $malopErr="<h6>Sai định dạng mã lớp</h6>";
                    }
                }
                if(empty($tenlop)){
                    $tenlopErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tenlops=test_input($tenlop);
                    if(!preg_match('/^[A-Z0-9]$/',$tenlops)){
                        $tenlopErr="<h6>Sai định dạng tên lớp</h6>";
                    }
                }
                if(empty($siso)){
                    $sisoErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $sisos=test_input($siso);
                    if(!preg_match('/^[\d]{1,3}$/',$sisos)){
                        $sisoErr="<h6>Sai định dạng sỉ số</h6>";
                    }
                }
                if(!$malopErr && !$tenlopErr && !$sisoErr){
                    if ($kiemtra >0 ) {
                        echo '<script> alert ("Mã lớp tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=lop&act=themlop"/>';
                    } 
                    else if($kt >0){
                        echo '<script> alert ("Tên lớp tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=lop&act=themlop"/>';
                    }
                    else{
                        $db->insertLop($malops, $tenlops, $sisos);
                        echo '<script> alert ("Nhập lớp thành công")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=lop&act=lop"/>';
                    }
                }
            }
            include "View/themlop.php";
            break;
        case "delete_lop":
                if (isset($_GET['maLop'])) {
                $malop = $_GET['maLop'];
                $db= new lop();
                $db -> deleteLop($malop);
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=lop&act=lop"/>';
                }
            break;
        case "update_lop":
            $malop =$_POST['maLop'] ;
            $tenlop = $_POST['tenLop'];
            $siso = $_POST['siso'];
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $malops=$tenlops=$sisos="";
            $malopErr=$tenlopErr=$sisoErr="";
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($malop)){
                    $malopErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $malops=test_input($malop);
                    if(!preg_match('/^[\d]{1,10}$/',$malops)){
                        $malopErr="<h6>Sai định dạng mã lớp</h6>";
                    }
                }
                if(empty($tenlop)){
                    $tenlopErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tenlops=test_input($tenlop);
                    if(!preg_match('/^[A-Z0-9]$/',$tenlops)){
                        $tenlopErr="<h6>Sai định dạng tên lớp</h6>";
                    }
                }
                if(empty($siso)){
                    $sisoErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $sisos=test_input($siso);
                    if(!preg_match('/^[\d]{1,3}$/',$sisos)){
                        $sisoErr="<h6>Sai định dạng sỉ số</h6>";
                    }
                }
                if(!$malopErr && !$tenlopErr && !$sisoErr){
                    $db = new lop();
                    $db->updateLop($malops,$tenlops,$sisos);
                    echo '<script> alert ("Update thông tin lớp thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=lop&act=lop"/>';
                }
            }
            include "View/updatelop.php";
            break;
    }
?>