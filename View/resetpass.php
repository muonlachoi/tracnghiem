<div class="container ">
    <?php
        if(isset($_GET['key']) && isset($_GET['reset'])):
            $email=$_GET['key'];
            $pass=$_GET['reset'];
            $ur=new sinhvien();
            $result=$ur->getPassEmail($email,$pass);
            if($result!=false):
            $emailold=$result['email']; 
    ?>
            <form action="index.php?action=forgetpass&act=submit_new" method="post" name='resetpass' class="form mt-5 mb-5">
                <table align='center' class=" mt-md-4">
                    <tr class="text-md-center">
                        <th colspan=2>
                            <h2 class='mb-3'>Nhập Mật Khẩu Mới</h2>
                        </th>
                    </tr>
                    <input type="hidden" name="email" value="<?php echo $emailold;?>">
                    <tr>
                        <td><input class="form-control" type="password" placeholder="password" name='password'></td>
                    </tr>
                    <tr class="text-md-center">
                        <td colspan=2>
                            <input type="submit" name="submit_password" class="btn btn-primary ms-md-4 mt-md-2" value="Save Password">
                        </td>
                    </tr>
                </table>
            </form>
    <?php
            endif;
           
    ?>
    <?php
        endif; 
    ?>
</div>