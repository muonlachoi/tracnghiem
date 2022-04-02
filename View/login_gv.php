<?php 
  if(isset($_SESSION['maHS']))
  {
    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=log_out"/>';
  }
  if(isset($_SESSION['maGV']))
  {
    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
  }
?>
<div class="container ">
        <form action="index.php?action=login_gv&act=lg_gv" method="post" name='dangnhapgv' class=" form mt-5 mb-5">
            <table align='center' class=" mt-md-4">
                <tr class="text-md-center ">
                    <th colspan=2>
                        <h2 class="mb-3">Đăng Nhập Giáo Viên</h2>
                    </th>
                </tr>
                <tr>
                    <td ><b>Mã giáo viên:</b></td>
                </tr>
                <tr >
                    
                    <td><input class="form-control" type="text" placeholder="Mã số giáo viên" name="maGV"></td>
                </tr>
                <tr>
                    <td><b>Mật khẩu:</b></td>
                </tr>
                <tr>
                   
                    <td><input class="form-control" placeholder="Password" type="password" name="PassGV"></td>
                </tr>
                <tr class="text-md-center">
                    <td colspan=2>
                        <input type="submit" name="submit" class="btn btn-primary dangnhapGV ms-md-4 mt-md-2" value="Đăng Nhập">
                    </td>
                </tr>
            </table>
        </form>
    </div>