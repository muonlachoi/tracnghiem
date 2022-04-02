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
        <div class="container ">
        <div class="row" style="display:flex;justify-content:center">
            <form action="index.php?action=phancong&act=themphancong" class="col-md-7 " method="post">
                <!-- Name input -->
                <h5 class="text-danger text-center">THÊM PHÂN CÔNG</h5>
                <div class="form-outline " >
                    <label  class="form-label" for="form5Example1">Tên giáo viên</label>  
                    <select class="textform  form-control"  name="maGV" size="1" id="">
                        <?php
                            $sv= new giaovien();
                            $res=$sv->xemGV(); 
                            while($set = $res->fetch()):
                        ?>
                        <option class="h4" value="<?php echo $set['maGV']; ?>">
                            <?php echo  $set['tenGV'];?>
                        </option>

                        <?php
                        endwhile;
                        ?>
                    </select> 
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Môn</label>
                    <select class="textform form-control"  name="maMon" size="1" id="">
                        <?php
                            $sv= new mon();
                            $res=$sv->xemMon(); 
                            while($set = $res->fetch()):
                        ?>
                        <option class="h4" value="<?php echo $set['maMon']; ?>">
                            <?php echo  $set['tenMon'];?>
                        </option>

                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Lớp</label> 
                    <select class="textform form-control"  name="maLop" size="1" id="">
                        <?php
                            $sv= new lop();
                            $res=$sv->xemlop(); 
                            while($set = $res->fetch()):
                        ?>

                        <option class="h4" value="<?php echo $set['maLop']; ?>">
                            <?php echo  $set['tenLop'];?>
                        </option>

                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="form-outline mb-1">
                    <label class="form-label" for="form5Example2">Học kỳ</label> 
                    <select class="textform form-control"  name="id_hocky" size="1" id="">
                        <?php
                            $sv= new phancong();
                            $res=$sv->xemHK(); 
                            while($set = $res->fetch()):
                        ?>

                        <option class="h4 text-uppercase" value="<?php echo $set['id_hocky']; ?>">
                            <?php echo  $set['hocky'];?>
                        </option>

                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="form-outline mb-1 ">
                    <label class="form-label" for="form5Example2">Năm học</label> 
                    <select class="textform form-control"  name="id_namhoc" size="1" id="">
                        <?php
                            $sv= new phancong();
                            $res=$sv->xemNH(); 
                            while($set = $res->fetch()):
                        ?>

                        <option class="h4" value="<?php echo $set['id_namhoc']; ?>">
                            <?php echo  $set['namhoc'];?>
                        </option>

                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block mb-4  mt-3">Thêm</button>
                </div>
            </form>
        </div>
        </div>
    </section>
</div>