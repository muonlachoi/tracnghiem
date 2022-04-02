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
                if (isset($_GET['id_namhoc'])) {
                    $id_namhoc = $_GET['id_namhoc'];
                    $db = new phancong();
                    $result = $db->getlistNH($id_namhoc);
                    $namhoc = $result[1];
                }
            ?>
            <form action="index.php?action=phancong&act=update_namhoc" method="post">
            <!-- Name input -->
                <h5 class="">CHỈNH SỬA NĂM HỌC</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã năm học</label>
                    <div class="error"><?php if(isset($manhErr)) echo $manhErr; ?></div>
                    <input  type="text" id="form5Example1" name="id_namhoc" class="form-control" value="<?php echo $id_namhoc?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Năm học</label>
                    <div class="error"><?php if(isset($tennhErr)) echo $tennhErr; ?></div>
                    <input type="text" id="form5Example2" name="namhoc" class="form-control text-form" value="<?php echo $namhoc?>" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>
            </form>
        </div>
    </section>
</div>