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
                if (isset($_GET['maLop'])) {
                    $malop = $_GET['maLop'];
                    $db = new lop();
                    $result = $db->getListLop($malop);
                    $malop = $result[0];
                    $tenlop = $result[1];
                    $siso = $result[2];
                }
            ?>
            <form action="index.php?action=lop&act=update_lop" method="post">
            <!-- Name input -->
                <h5 class="">SỬA LỚP</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã Lớp</label>
                    <div class="error"><?php if(isset($malopErr)) echo $malopErr; ?></div>  
                    <input  type="text" id="form5Example1" name="maLop" class="form-control" value="<?php echo $malop?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Tên lớp</label>
                    <div class="error"><?php if(isset($tenlopErr)) echo $tenlopErr; ?></div>
                    <input type="text" id="form5Example2" name="tenLop" class="form-control text-form" value="<?php echo $tenlop?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Sỉ Số</label>
                    <div class="error"><?php if(isset($sisoErr)) echo $sisoErr; ?></div>
                    <input type="text" id="form5Example2" name="siso" class="form-control text-form" value="<?php echo $siso?>" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Đăng ký</button>
            </form>
        </div>
    </section>
</div>