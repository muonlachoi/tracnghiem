<?php
    $action='phancong';
    if(isset($_GET['act']))
    {
        $action=$_GET['act'];
    }
    switch($action)
    {     
        case "namhoc":
            include "View/namhoc.php";
            break;
        case "hocky":
            include "View/hocky.php";
            break;
        case "dsmon" : 
            include "View/danhsachmon.php";
            break;
        case "themhocky": 
            include "View/themhocky.php";
            break;
        case "dangkyhk":
            $id_hocky=$_POST['id_hocky'];
            $hocky=$_POST['hocky'];
            $db= new phancong();
            $kiemtra = $db->kiemtramaHK($id_hocky);
            $kt = $db->kiemtraHK($hocky);
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành '' 
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $mahk=$tenhk="";
            $mahkErr=$tenhkErr="";
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($id_hocky)){
                    $mahkErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $mahk=test_input($id_hocky);
                    if(!preg_match('/^[\d]{1,2}$/',$mahk)){
                        $mahkErr="<h6>Sai định dạng mã học kỳ</h6>";
                    }
                }
                if(empty($hocky)){
                    $tenhkErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tenhk=test_input($hocky);
                }
                if(!$mahkErr && !$tenhkErr){
                    if ($kiemtra >0 ) {
                        echo '<script> alert ("Mã học kỳ đã tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=themhocky"/>';
                    } 
                    else if($kt >0){
                        echo '<script> alert ("Học kỳ đã tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=themhocky&act=themhocky"/>';
                    }
                    else{
                        $db->insertHocKy($mahk,$tenhk);
                        echo '<script> alert ("Nhập lớp thành công")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home&act=home"/>';
                    }
                }
            }
            include "View/themhocky.php";
            break;
        case "updatehk" :
            include "View/updatehocky.php";
            break;
        case "update_hocky":
            $db= new phancong();
            $id_hocky =$_POST['id_hocky'] ;
            $hocky = $_POST['hocky'];
            $db->updatehocky($id_hocky,$hocky);
            echo '<script> alert ("Update học kỳ thành công")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=hocky"/>';
            break;
        case "delete_hocky":
            if (isset($_GET['id_hocky'])&& isset($_GET['id_namhoc'])) {
            $id_hocky = $_GET['id_hocky'];
            $id_namhoc = $_GET['id_namhoc'];
            $db= new phancong();
            $db -> deleteHK($id_hocky,$id_namhoc);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=hocky&id_namhoc='.$id_namhoc.'"/>';
            }
            break;
        case "themnam": 
            include "View/themnam.php";
            break;
        case "dangkynh": 
            $id_namhoc=$_POST['id_namhoc'];
            $namhoc=$_POST['namhoc'];
            $db= new phancong();
            $kiemtra = $db->kiemtramaNH($id_namhoc);
            $kt = $db->kiemtraNH($namhoc);
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $manh=$tennh="";
            $manhErr=$tennhErr="";
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                if(empty($id_namhoc)){
                    $manhErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $manh=test_input($id_namhoc);
                    if(!preg_match('/^[\d]{1,2}$/',$manh)){
                        $manhErr="<h6>Sai định dạng mã năm học</h6>";
                    }
                }
                if(empty($namhoc)){
                    $tennhErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tennh=test_input($namhoc);
                }
                if(!$manhErr && !$tennhErr){
                    if ($kiemtra >0 ) {
                        echo '<script> alert ("Mã học kỳ đã tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=themnam"/>';
                    } 
                    else if($kt >0){
                        echo '<script> alert ("Học kỳ đã tồn tại ")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=themnam"/>';
                    }
                    else{
                        $db->insertNamHoc($manh,$tennh);
                        echo '<script> alert ("Nhập lớp thành công")</script>';
                        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home&act=home"/>';
                    }
                }
            }
            include "View/themnam.php";
            break;
        case "updatenh" :
            include "View/updatenamhoc.php";
            break;
        case "update_namhoc":
            $id_namhoc =$_POST['id_namhoc'] ;
            $namhoc = $_POST['namhoc'];
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $manh=$tennh="";
            $manhErr=$tennhErr="";
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                if(empty($id_namhoc)){
                    $manhErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $manh=test_input($id_namhoc);
                    if(!preg_match('/^[\d]{1,2}$/',$manh)){
                        $manhErr="<h6>Sai định dạng mã năm học</h6>";
                    }
                }
                if(empty($namhoc)){
                    $tennhErr="<h6>Không được bỏ trống</h6>";
                }
                else{
                    $tennh=test_input($namhoc);
                }
                if(!$manhErr && !$tennhErr){
                    $db= new phancong();
                    $db->updatenamhoc($id_namhoc,$namhoc);
                    echo '<script> alert ("Update năm học thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=namhoc"/>';
                }
            }
            include "View/updatenamhoc.php";
            break;
        case "delete_namhoc":
            if (isset($_GET['id_namhoc'])) {
            $id_namhoc = $_GET['id_namhoc'];
            $namhoc = $_GET['namhoc'];
            $db= new phancong();
            $db -> deleteNH($id_namhoc,$namhoc);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=namhoc"/>';
            }
            break;
        case "phancong": 
            include "View/phancong.php";
            break;
        case "add_phancong": 
            include "View/themphancong.php";
            break;
        case "themphancong":
            $magv=$_POST['maGV'];
            $mamon=$_POST['maMon'];
            $malop=$_POST['maLop'];
            $id_hocky=$_POST['id_hocky'];
            $id_namhoc=$_POST['id_hocky'];
            $db= new phancong();
            $ktphancong= $db->ktphancong($mamon,$malop,$id_hocky,$id_namhoc);
            if($ktphancong >0){
                echo '<script> alert ("Môn của lớp đó đã có đăng ký rồi, vui lòng kiểm tra lại! ")</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=add_phancong"/>';
            }else{
                $db->insertPhanCong($magv,$mamon,$malop,$id_hocky,$id_namhoc);
                echo '<script> alert ("Nhập lớp thành công")</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=dsmon&id_namhoc='.$id_namhoc.'&id_hocky='.$id_hocky.'"/>';
            }
            break;
        case "importPC":
            $uploadfile=$_FILES['uploadfile']['tmp_name'];
            require 'PHPExcel/Classes/PHPExcel.php';
            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
            $objExcel=PHPExcel_IOFactory::load($uploadfile);
            foreach($objExcel->getWorksheetIterator() as $worksheet)
            {
                $highestrow=$worksheet->getHighestRow();
                for($row=0;$row<=$highestrow;$row++)
                {
                    $magv=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
                    $mamon=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                    $malop=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                    $id_hocky=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
                    $id_namhoc=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
                    $db = new phancong($magv,$mamon,$malop,$id_hocky,$id_namhoc);
                    $db->insertPC($magv,$mamon,$malop,$id_hocky,$id_namhoc);
                    echo '<script> alert ("Nhập lớp thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=namhoc"/>';
                    
                }
            }
            break;
        case "updatepc" : 
            include "View/updatephancong.php";
            break;
        case "update_phancong":
            $magv=$_POST['maGV'];
            $mamon=$_POST['maMon'];
            $malop = $_POST['maLop'];
            $id_hocky = $_POST['id_hocky'];
            $id_namhoc = $_POST['id_namhoc'];
            $id_pc = $_POST['id_pc'];
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            $magvs=$mamons=$malops=="";
            $magvErr=$mamonErr=$malopErr="";
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
                if(!$magvErr)
                {
                    $db= new phancong();
                    $db->updatephancong($magvs,$mamon,$malop,$id_hocky,$id_namhoc,$id_pc);
                    echo '<script> alert ("Update công việc thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=dsmon&id_namhoc='.$id_namhoc.'&id_hocky='.$id_hocky.'"/>';
                }
            }
            include "View/updatephancong.php";
            break;
        case "deletePC":
            if (isset($_GET['id_pc']) && isset($_GET['id_namhoc']) && isset($_GET['id_hocky'])) {
            $id_pc = $_GET['id_pc'];
            $id_namhoc = $_GET['id_namhoc'];
            $id_hocky = $_GET['id_hocky'];
            $db= new phancong();
            $db -> deletePC($id_pc,$id_namhoc,$id_hocky);
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=phancong&act=dsmon&id_namhoc='.$id_namhoc.'&id_hocky='.$id_hocky.'"/>';
            }
            break;
    }   
?>