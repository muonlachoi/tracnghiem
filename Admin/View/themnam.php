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
            <form action="index.php?action=phancong&act=dangkynh" method="post">
                <!-- Name input -->
                <h5 class="">THÊM NĂM HỌC</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã năm học</label>
                    <div class="error"><?php if(isset($manhErr)) echo $manhErr; ?></div> 
                    <input  type="text" id="form5Example1" name="id_namhoc" class="form-control" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Năm học</label>
                    <div class="error"><?php if(isset($tennhErr)) echo $tennhErr; ?></div>
                    <input type="text" id="form5Example2" name="namhoc" class="form-control text-form" />
                </div>
                
                <button type="submit" class="btn btn-primary btn-block mb-4">Đăng ký</button>
            </form>
        </div>
    </section>
</div>