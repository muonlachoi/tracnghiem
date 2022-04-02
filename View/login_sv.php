<?php 
  if(isset($_SESSION['maGV']))
  {
    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=log_out"/>';
  }
  if(isset($_SESSION['maHS']))
  {
    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=sinhvien&act=sinhvien"/>';
  }
?>
<div class="container ">
        <form action="index.php?action=login_sv&act=lg_sv" method="post" name='dangnhapsv' class="form mt-5 mb-5">
            <table align='center' class=" mt-md-4">
                <tr class="text-md-center">
                    <th colspan=2>
                        <h2 class='mb-3'>Đăng Nhập Sinh Viên</h2>
                    </th>
                </tr>
                <tr>
                    <td><b>Mã sinh viên:</b></td>
                </tr>
                <tr>
                    
                    <td><input class="form-control" placeholder="Mã số sinh viên" type="text" name="mahs"></td>
                </tr>
                <tr>
                    <td><b>Mật khẩu:</b></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="password" placeholder="Password" name="PassSV"></td>
                </tr>
                <tr><td class=><a href="index.php?action=forgetpass" class="text-decoration-none">Quên mật khẩu</a></td></tr>
                <tr class="text-md-center">
                    <td colspan=2>
                        <input type="submit" name="submit" class="btn btn-primary dangnhapSV ms-md-4 mt-md-2" value="Đăng Nhập">
                    </td>
                </tr>
            </table>
        </form>
    </div>