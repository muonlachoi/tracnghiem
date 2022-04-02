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
                if (isset($_GET['maMon'])) {
                    $mamon = $_GET['maMon'];
                    $db = new mon();
                    $result = $db->getListMon($mamon);
                    $mamon = $result[0];
                    $tenmon = $result[1];
                }
            ?>
            <form action="index.php?action=mon&act=update_mon" method="post">
                <!-- Name input -->
                <h5 class="">SỬA MÔN</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã Môn</label>
                    <div class="error"><?php if(isset($mamonErr)) echo $mamonErr; ?></div>
                    <input  type="text" id="form5Example1" name="maMon" class="form-control" value="<?php echo $mamon?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Tên Môn</label>
                    <div class="error text-start"><?php if(isset($tenmonErr)) echo $tenmonErr; ?></div>
                    <input type="text" id="form5Example2" name="tenMon" class="form-control text-form" value="<?php echo $tenmon?>" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>
            </form>
        </div>
    </section>
</div>