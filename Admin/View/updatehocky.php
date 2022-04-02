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
                if (isset($_GET['id_hocky'])) {
                    $id_hocky = $_GET['id_hocky'];
                    $db = new phancong();
                    $result = $db->getlistHK($id_hocky);
                    $hocky = $result[1];
                }
            ?>
            <form action="index.php?action=phancong&act=update_namhoc" method="post">
            <!-- Name input -->
                <h5 class="">CHỈNH SỬA HỌC KỲ</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã học kỳ</label>
                    <div class="error"><?php if(isset($mahkErr)) echo $mahkErr; ?></div>
                    <input  type="text" id="form5Example1" name="id_hocky" class="form-control" value="<?php echo $id_hocky?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Học kỳ</label>
                    <div class="error"><?php if(isset($tenhkErr)) echo $tenhkErr; ?></div>
                    <input type="text" id="form5Example2" name="hocky" class="form-control text-form" value="<?php echo $hocky?>" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>
            </form>
        </div>
    </section>
</div>