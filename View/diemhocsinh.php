<section>
    <div class="container">
        <div class="row">
        <h2 class="text-center text-danger mb-md-3">Bảng điểm của: <?php echo $_SESSION['tenHS']; ?> </h2>
        <table class=" table table-bordered text-center "> 
        <!-- <thead> -->
        
            <tr class="bg bg-secondary text-light ">
            <!-- <th scope="col">Mã sinh viên</th> -->
            <th scope="col">Tên môn học</th>
            <th scope="col">Mã đề</th>
            <th scope="col">Tên giáo viên dạy</th>
            <th scope="col">Số câu đúng</th>
            <th scope="col">Điểm</th>
            </tr>
        <!-- </thead> -->
        <?php
            if(isset($_SESSION['maHS'])):
                $mahs=$_SESSION['maHS'];
                $db= new ketqua();
                $result=$db->ketquaDA($mahs); 

            while($set = $result->fetch()):
        ?>
        <!-- <tbody> -->
            <tr>
            <!-- <td><?php //echo $set['maHS'] ?> </td> -->
            <td><?php echo $set['tenMon'] ?> </td>
            <td><?php echo $set['maDe'] ?> </td>
            <td><?php echo $set['tenGV'] ?></td>
            <td><?php echo $set['socaudung'] ?>/<?php echo $set['soluongcauhoi'] ?></td>
            <td><?php echo $set['diem'] ?></td>
            </tr>
        <!-- </tbody> -->
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