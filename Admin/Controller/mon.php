<?php
    $action='mon';
    if(isset($_GET['act']))
    {
        $action=$_GET['act'];
    }
    switch($action)
    {
        case "mon":
            include  "View/mon.php";
            break;
        case "themmon":
            include "View/themmon.php";
            break;
        case "update":
            include "View/updatemon.php";
            break;
        case "dangky_mon": 
            $mamon=$_POST['maMon'];
            $tenmon=$_POST['tenMon'];
            $db= new mon();
            $kiemtra = $db->kiemtramaMon($mamon);
            $kt = $db->kiemtraTenMon($tenmon);
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $mamons=$tenmons="";
            $mamonErr=$tenmonErr="";
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($mamon)){
                    $mamonErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $mamons=test_input($mamon);
                    if(!preg_match('/^[A-Z0-9]$/',$mamons)){
                        $mamonErr="<h6>Sai định dạng mã môn</h6>";
                    }
                }
                if(empty($tenmon)){
                    $tenmonErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tenmons=test_input($tenmon);
                }
                if(!$mamonErr && !$tenmonErr )
                {
                    if ($kiemtra >0 ) {
                        echo '<script> alert ("Mã môn tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=mon&act=themmon"/>';
                    } 
                    else if($kt >0){
                        echo '<script> alert ("Tên môn tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=mon&act=themmon"/>';
                    }
                    else{
                        $db->insertMon($mamons, $tenmons);
                        echo '<script> alert ("Nhập lớp thành công")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=mon&act=mon"/>';
                    }  
                }
            }
            include "View/themmon.php";
            break;
        case "delete_mon":
                if (isset($_GET['maMon'])) {
                $mamon = $_GET['maMon'];
                $db= new mon();
                $db -> deleteMon($mamon);
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=mon&act=mon"/>';
                }
            break;
        case "update_mon":   
            $mamon =$_POST['maMon'] ;
            $tenmon = $_POST['tenMon'];
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $mamons=$tenmons="";
            $mamonErr=$tenmonErr="";
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($mamon)){
                    $mamonErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $mamons=test_input($mamon);
                    if(!preg_match('/^[A-Z0-9]$/',$mamons)){
                        $mamonErr="<h6>Sai định dạng mã môn</h6>";
                    }
                }
                if(empty($tenmon)){
                    $tenmonErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tenmons=test_input($tenmon);
                }
                if(!$mamonErr && !$tenmonErr )
                {
                    $db= new  mon(); 
                    $db->updateMon($mamons,$tenmons);
                    echo '<script> alert ("Update thông tin môn thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=mon&act=mon"/>';
                }
            }
            include "View/updatemon.php";
            break;
            
    }
?>