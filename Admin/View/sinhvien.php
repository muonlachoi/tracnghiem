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
            <h5>NHẬP DANH SÁCH SINH VIÊN</h5>
            <form action="index.php?action=sinhvien&act=importSV" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-sm mb-md-3 ">
                    <input type="file" class="form-control form-control-sm" name="uploadfile" id="uploadfile">
                    <input type="submit" name="submit" value="Import" class="input-group-text">
                </div>
            </form>
        
            <div class="row">
                <?php 
                    if(isset($_GET['maLop'])){
                        $malop=$_GET['maLop'];
                        $db= new lop();
                        $result=$db->tenLop($malop);
                        $tenlop=$result['tenLop'];
                    }
                ?>
                <h2 class="text-center text-danger mb-md-3">THÔNG TIN SINH VIÊN LỚP <?php echo $tenlop; ?> </h2>
            
                <table class=" table table-bordered table-hover text-center"> 
                    <thead>
                    <tr>
                        <!-- <th scope="col">Mã sinh viên</th> -->
                        <th scope="col">Mã học sinh</th>
                        <th scope="col">Tên học sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Email</th>
                        <th scope="col">user</th>
                        <th scope="col">Pass</th>   
                        <th scope="col">Lớp</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                
                    <?php
                    if(isset($_GET['maLop'])):
                        $malop=$_GET['maLop'];
                        $db= new sinhvien();
                        $result= $db->listSinhViens($malop);
                        while ($set=$result->fetch()): 
                    ?>
                    <tbody>
                    <tr>
                        <!-- <td><?php //echo $set['maHS'] ?> </td> -->
                        <td> <?php echo $set['maHS'] ?></td>
                        <td>  <?php echo $set['tenHS'] ?></td>
                        <td>  <?php echo $set['diachi'] ?></td>
                        <td>  <?php echo $set['email'] ?></td>
                        <td>  <?php echo $set['user'] ?></td>
                        <td> <?php echo $set['pass'] ?></td>
                        <td>  <?php echo $tenlop ?>
                        </td>
                        <td class="text-center">
                            <a href="index.php?action=sinhvien&act=update&maHS=<?php echo $set['maHS'];  ?>" class="btn btn-warning mb-md-1">Sửa</a>
                            <a href="index.php?action=sinhvien&act=deleteSV&maHS=<?php echo $set['maHS']?>" 
                            onclick="return confirm('Bấm vào nút OK để tiếp tục');" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                        endwhile;
                    ?>
                    <?php
                        endif;
                    ?>
                </table>
            </div>
        </div>
    </section>
</div>

  