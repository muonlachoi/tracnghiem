<section>
    <div class="container">
        <div class="row">
        <h2 class="text-center text-danger mb-md-3 mt-5">DANH SÁCH CÁC LỚP</h2>
        <table class=" table table-bordered table-hover text-center"> 
        
            <tr class="bg-secondary text-light">
            <th scope="col">Mã lớp</th>
            <th scope="col">Tên lớp</th>
            <th scope="col">Xem điểm của lớp</th>
            <th scope="col">Xem danh sách sinh viên</th>
            </tr>
       
        <?php
           if(isset($_GET['maMon']) && isset($_SESSION['maGV'])):
            $mamon=$_GET['maMon'];
            $magv=$_SESSION['maGV'];
            $db= new giaovien();
            $result=$db->dsLop($magv,$mamon);
            while($set = $result->fetch()):
        ?>
            <tr>
            <td><h6><?php echo $set['maLop'] ?></h6></td>
            <td><h6><?php echo $set['tenLop'] ?></h6></td>
            <td class="w-25 l-hover">
                <a class="dropdown-item btn" href="index.php?action=giaovien&act=danhsachdiem&maMon=<?php echo $mamon; ?>&maLop=<?php echo $set['maLop'] ?>"> <span class="h6">Xem list điểm</span></a>
            </td>
            <td class="w-25 l-hover">
                <a class="dropdown-item btn" href="index.php?action=giaovien&act=dshocsinh&maMon=<?php echo $mamon; ?>&maLop=<?php echo $set['maLop'] ?>"><span class=" h6">Xem list học sinh</span></a>
            </td>
            </tr>
        
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