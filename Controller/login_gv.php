<?php
$action = 'login_gv';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "login_gv":
        include 'View/login_gv.php';
        break;
    case "lg_gv":
        $magv = $_POST['maGV'];
        $pass = $_POST['PassGV'];
        $cypt = md5($pass);
        $db = new giaovien();
        $log = $db->login_gv($magv,$cypt);
        //lưu thông tin giáo viên
        if ($log != false) {
            $_SESSION['maGV'] = $log[0];
            $_SESSION['tenGV'] = $log[1];
            $_SESSION['user'] = $log[2];
            $_SESSION['pass'] = $log[3];
            $_SESSION['role'] = $log[4];
            // echo '<script> alert("Đăng nhập thành công!")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
        } else {
            echo '<script> alert("Mã giáo viên hoặc mật khẩu không chính xác!")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login_gv"/>';
        }
        break;
}
