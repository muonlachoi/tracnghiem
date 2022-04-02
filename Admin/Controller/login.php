<?php
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action){
    case "login":
        include 'View/login.php';
        break;
    case "login_action":
        // truyền qua đây là tên admin, pass
        $user=$_POST['txtUser'];
        $pass=$_POST['txtPass'];
        $cypt=md5($pass);
        $dn=new Login();
        $result=$dn->logAdmin($user,$cypt);
        if($result!=false)
        {
            $_SESSION['admin']=$result[0];
            echo'<script> alert("Đăng nhập thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=home"/>';
        }
        else{
            echo'<script> alert("Đăng nhập không thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=../index.php?action=login"/>';
        }
        break;
}
?>