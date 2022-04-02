<?php 
    if(!isset($_SESSION['admin']))
    {
        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login"/>';
    }
?>
<div class="col-lg-2">
    <?php
        include "View/sidebar.php";
    ?>
</div>
<div class="col-lg-10">
    <section>
        <div class="container-fluid">
            <?php
                if (isset($_GET['maHS'])) {
                    $mahs = $_GET['maHS'];
                    $db = new sinhvien();
                    $result = $db->getlistSinhVien($mahs);
                    $tenhs = $result[1];
                    $diachi = $result[2];
                    $email = $result[3];
                    $user = $result[4];
                    $pass = $result[5];
                    $malop = $result[6];

                }
            ?>
            <form action="index.php?action=sinhvien&act=update_sv" method="post">
            <!-- Name input -->
                <h5 class="">CHỈNH SỬA THÔNG TIN SINH VIÊN</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã sinh viên</label> 
                    <div class="error"><?php if(isset($masvErr)) echo $masvErr; ?></div> 
                    <input  type="text" id="form5Example1" name="maHS" class="form-control" value="<?php echo $mahs?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Tên sinh viên</label>
                    <div class="error"><?php if(isset($tensvErr)) echo $tensvErr; ?></div>
                    <input type="text" id="form5Example2" name="tenHS" class="form-control text-form" value="<?php echo $tenhs?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Địa chỉ</label>
                    <div class="error"><?php if(isset($diachiErr)) echo $diachiErr; ?></div>
                    <input type="text" id="form5Example2" name="diachi" class="form-control text-form" value="<?php echo $diachi?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Email</label>
                    <div class="error"><?php if(isset($emailErr)) echo $emailErr; ?></div>
                    <input type="text" id="form5Example2" name="email" class="form-control text-form" value="<?php echo $email?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">User</label>
                    <div class="error"><?php if(isset($userErr)) echo $userErr; ?></div>
                    <input type="text" id="form5Example2" name="user" class="form-control text-form" value="<?php echo $user?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Password</label>
                    <div class="error"><?php if(isset($passErr)) echo $passErr; ?></div>
                    <input type="text" id="form5Example2" name="pass" class="form-control text-form" value="<?php echo $pass?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Lớp</label> <br>
                    <select class="textform w-50 form-control"  name="maLop" size="1" id="">
                        <?php
                            $sv= new lop();
                            $res=$sv->xemlop(); 
                            while($set = $res->fetch()):
                        ?>

                        <option value="<?php echo $set['maLop']; ?>">
                            <?php echo  $set['tenLop'];?>
                        </option>

                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>
            </form>
        </div>
    </section>
</div>