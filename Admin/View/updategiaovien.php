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
                if (isset($_GET['maGV'])) {
                    $magv = $_GET['maGV'];
                    $db = new giaovien();
                    $result = $db->getListGiaoVien($magv);
                    $tengv = $result[1];
                    $user = $result[2];
                    $pass = $result[3];
                    $role = $result[4];
                }
            ?>
            <form action="index.php?action=giaovien&act=update_gv" method="post">
                <!-- Name input -->
                <h5 class="">CHỈNH SỬA THÔNG TIN GIÁO VIÊN</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã giáo viên</label>
                    <div class="error"><?php if(isset($magvErr)) echo $magvErr; ?></div>
                    <input  type="text" id="form5Example1" name="maGV" class="form-control" value="<?php echo $magv?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Tên giáo viên</label>
                    <div class="error"><?php if(isset($tengvErr)) echo $tengvErr; ?></div>
                    <input type="text" id="form5Example2" name="tenGV" class="form-control text-form" value="<?php echo $tengv?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Tài khoản</label>
                    <div class="error"><?php if(isset($userErr)) echo $userErr; ?></div>
                    <input type="text" id="form5Example2" name="user" class="form-control text-form" value="<?php echo $user?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Mật khẩu</label>
                    <div class="error"><?php if(isset($passErr)) echo $passErr; ?></div>
                    <input type="text" id="form5Example2" name="pass" class="form-control text-form" value="<?php echo $pass?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label " for="form5Example2">Chứ vụ</label> <br>
                    <select class="textform w-50 form-control"  name="role" size="1" id="">
                        <?php
                            $sv= new giaovien();
                            $res=$sv->getListGV(); 
                                while($set = $res->fetch()):
                        ?>
                        <option value="<?php echo $set['role']; ?>">
                            <?php   if($set['role']==1)
                            {
                                echo "Giáo Viên";
                            }
                            if($set['role']==2)
                            {
                                echo "Hiệu Trưởng";
                            }
                            ?>
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