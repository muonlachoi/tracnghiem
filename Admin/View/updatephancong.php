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
                if (isset($_GET['id_namhoc']) &&  isset($_GET['id_hocky']) && isset($_GET['id_pc'])) {
                    $id_namhoc = $_GET['id_namhoc'];
                    $id_hocky = $_GET['id_hocky'];
                    $id_pc = $_GET['id_pc'];
                    $db = new phancong();
                    $result = $db->listPC($id_namhoc,$id_hocky,$id_pc);
                    $magv = $result[0];
                    $mamon = $result[1];
                    $malop = $result[2];
                    $hocky = $result[4];
                    $namhoc = $result[5];
                }
            ?>
            <form action="index.php?action=phancong&act=update_phancong" method="post">
            <!-- Name input -->
                <h5 class="text-danger text-center">CHỈNH SỬA PHÂN CÔNG </h5>
                <div class="form-outline ">
                    <label  class="form-label" for="form5Example1">Mã giáo viên</label>

                    <input  type="text" id="form5Example1" name="maGV" class="form-control w-50" value="<?php echo $magv?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Mã môn</label>
                    <select class="textform w-50 form-control"  name="maMon" size="1" id="">
                            <?php
                                $sv= new mon();
                                $res=$sv->xemMon(); 
                                while($set = $res->fetch()):
                            ?>
                            <option value="<?php echo $set['maMon']; ?>">
                                <?php echo  $set['tenMon'];?>
                            </option>

                            <?php
                            endwhile;
                            ?>
                        </select>
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Mã lớp</label>
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
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Học kỳ</label>
                    <input type="hidden" id="form5Example2" name="id_hocky" class="form-control text-form" value="<?php echo $id_hocky?>" />
                    <input type="text" id="form5Example2" name="hocky" class="form-control w-50 text-form" disabled value="<?php echo $hocky?>" />
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Năm học</label>
                    <input type="hidden" id="form5Example2" name="id_namhoc" class="form-control text-form" value="<?php echo $id_namhoc?>" />
                    <input type="text" id="form5Example2" name="namhoc" class="form-control w-50 text-form" disabled value="<?php echo $namhoc?>" />
                </div>       
                <button type="submit" class="btn btn-primary mt-3 btn-block mb-4">Cập nhật</button>
                <input type="hidden" id="form5Example2" name="id_pc" class="form-control text-form" value="<?php echo $id_pc?>" />
            </form>
        </div>
    </section>
</div>