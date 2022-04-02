<section> 
    <div>
    <?php
            if (isset($_GET['maHS']) && isset($_GET['maLop']) && isset($_GET['maMon'])) {
                $mahs = $_GET['maHS'];
                $malop = $_GET['maLop'];
                $mamon = $_GET['maMon'];
                $db = new giaovien();
                $result = $db->getListSinhVien($mahs,$malop,$mamon);
                $mahs = $result[0];
                $tenhs = $result[1];
                $diachi = $result[2];
                $email = $result[3];
                $malop = $result['maLop'];
                $mamon = $result['maMon'];
                
            }
        ?>
        
        <form action="index.php?action=giaovien&act=update_sinhvien&maMon=<?php echo $mamon ?>&maLop=<?php echo $malop ?>" method="post" name='suasinhvien' class="form" >
            <table align='center' class="text-md-end mt-md-4">
                <tr class="text-md-center ">
                    <th colspan=2>
                        <h3>Chỉnh Sửa Thông Tin Sinh Viên</h3>
                    </th>
                </tr>
               
                    <input class="form-control" type="hidden" name="maHS"  value="<?php echo $mahs?>" size="45px">
                
                <tr>
                    <td><b>Tên sinh viên</b></td>
                    <td><input class="form-control ms-2" type="text" name="tenHS" value="<?php echo $tenhs ?>" size="45px"></td>
                    <td>
                        <span class=error><?php if(isset($tenErr)) echo $tenErr; ?>
                    </td>
                </tr>
                <tr>
                    <td ><b>Địa chỉ</b></td>
                    <td><input class="form-control ms-2" type="text" name="diachi" value="<?php echo $diachi ?>" size="45px"></td>
                    <td>
                        <span class=error><?php if(isset($DCErr)) echo $DCErr; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Số điện thoại</b></td>
                    <td><input class="form-control ms-2" type="text" name="email" value="<?php echo $email ?>" size="45px"></td>
                    <td>
                        <span class=error><?php if(isset($emailErr)) echo $emailErr; ?>
                    </td>
                </tr>
               
               
                <tr class="text-md-center">
                    <td colspan=2><input type="submit" name="submit" class="btn btn-primary  mt-md-2" value="Cập nhật"></td>
                </tr>
            </table>
        </form>
    </div>
    
</section>