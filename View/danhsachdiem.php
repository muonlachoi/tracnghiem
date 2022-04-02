<section>
    <div class="container">
        <div class="row">
        <?php 
            if(isset($_GET['maLop'])){
                $malop=$_GET['maLop'];
                $db= new giaovien();
                $result=$db->tenLop($malop);
                $tenlop=$result['tenLop'];
            }
        ?>
        <h2 class="text-center text-danger mb-md-3">BẢNG ĐIỂM SINH VIÊN LỚP <?php echo $tenlop; ?> </h2>

        <table class=" table table-bordered  text-center "> 
        
            <tr class="bg bg-secondary text-light">
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Mã sinh viên</th>
            <th scope="col">Tên môn học</th>
            <th scope="col">Mã đề</th>
            <th scope="col">Số câu đúng</th>
            <th scope="col">Điểm</th>
            </tr>
        <?php
            if(isset($_GET['maLop']) && isset($_GET['maMon']) && isset($_SESSION['maGV'])):
                $malop=$_GET['maLop'];
                $mamon=$_GET['maMon'];
                $magv=$_SESSION['maGV'];
                $db= new giaovien();
                $result=$db->listDiemHs($magv,$mamon,$malop);
                while($set= $result->fetch()):
        ?>
            <tr>
            <td><?php echo $set['tenHS'] ?> </td>
            <td><?php echo $set['maHS'] ?> </td>
            <td><?php echo $set['tenMon'] ?> </td>
            <td><?php echo $set['maDe'] ?> </td>
            <td><?php echo $set['socaudung'] ?>/<?php echo $set['soluongcauhoi'] ?></td>
            <td><?php echo $set['diem'] ?></td>
            </tr>
        
            <?php
        endwhile;
        ?>
        <?php
        endif;
        ?>
        </tbody>
        </table>
        </div>
    </div>
</section>