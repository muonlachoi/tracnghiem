<?php
$action = 'login_sv';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "login_sv":
        include 'View/login_sv.php';
        break;
    case "lg_sv":
        $mahs = $_POST['mahs'];
        $pass = $_POST['PassSV'];
        $cypt = md5($pass);
        $db = new sinhvien();
        $log = $db->login_sv($mahs, $cypt);
        
        //lưu thông tin sinh viên
        if ($log != false) {
            $_SESSION['maHS'] = $log[0];
            $_SESSION['tenHS'] = $log[1];
            $_SESSION['diachi'] = $log[2];
            $_SESSION['email'] = $log[3];
            $_SESSION['user'] = $log[4];
            $_SESSION['pass'] = $log[5];
            $_SESSION['tenLop'] = $log[6];
            // echo '<script> alert("Đăng nhập thành công!")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=sinhvien&act=sinhvien"/>';
        } 
        else{
            echo '<script> alert("Mã sinh viên hoặc mật khẩu không chính xác!")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login_sv"/>';
        }
        break;
}
