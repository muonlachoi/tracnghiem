<?php
$action="forgetpass";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "forgetpass":
        include "View/forgetpass.php";
        break;
    case "forgetpass_action":
        if(isset($_POST['submit_email']) && !empty($_POST['email']))
        {

            $getemail=$_POST['email'];
            $ur=new sinhvien();
            $result=$ur->getEmail($getemail);
            if($result==0){
                echo '<script> alert ("Email không có liên kết tài khoản, Vui lòng kiểm tra lại!")</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
            }else{
                // lấy ra email và pass trên data
                $email=md5($result['email']);
                $pass=md5($result['pass']);
                // tạo đường link gửi mail
                $link="<a href='http://localhost/index.php?action=forgetpass&act=resetpass&key=".$email."&reset=".$pass."'>Reset password</a>";
                $mail = new PHPMailer();
                $mail->CharSet ="utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication   
                $mail->SMTPAuth = true;
                // GMAIL username
                $mail->Username = "quantrivien003@gmail.com";
                // GMAIL password
                $mail->Password = "Admin2021";
                $mail->SMTPSecure = "tls";
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port="587";
                $mail->From='quantrivien003@gmail.com';
                $mail->FromName='Admin';
                $mail->AddAddress($getemail,'reciever_name');
                $mail->Subject='Reset Password';
                $mail->IsHTML(true);
                $mail->Body='Nhấn vào link để đặt lại mật khẩu '.$link.'';
                if($mail->Send())
                {
                    echo '<script> alert ("Check email và nhấn vào link để đặt lại mật khẩu")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home"/>';
                }
                else
                {
                    echo '<script> alert ("Mail Error")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
                }
            }
        }else{
            echo '<script> alert ("Vui lòng không bỏ trống !")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
        }
        break;
    case "resetpass":
        include "View/resetpass.php";
        break;
    case "submit_new":
        if(isset($_POST['submit_password']))
        {
            $passnew=md5($_POST['password']);
            $emailold=$_POST['email'];
            $ur=new sinhvien();
            $ur->updateEmail($emailold,$passnew);
            echo'<script> alert("Thay đổi mật khẩu thành công");</script>';
        }
        include "View/login_sv.php";
        break;
}
?>