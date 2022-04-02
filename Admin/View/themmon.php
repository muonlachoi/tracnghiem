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
            <form action="index.php?action=mon&act=dangky_mon" method="post">
            <!-- Name input -->
            <h5 class="">THÊM MÔN</h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã môn</label>
                    <div class="error"><?php if(isset($mamonErr)) echo $mamonErr; ?></div>
                    <input  type="text" id="form5Example1" name="maMon" class="form-control" />
                
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Tên môn</label>
                    <div class="error text-start"><?php if(isset($tenmonErr)) echo $tenmonErr; ?></div> 
                    <input type="text" id="form5Example2" name="tenMon" class="form-control text-form" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Thêm</button>

            </form>
        </div>
    </section>
</div>