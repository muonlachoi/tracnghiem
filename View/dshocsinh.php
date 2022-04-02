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
        <h2 class="text-center text-danger mb-md-3">DANH SACH SINH VIÊN LỚP <?php echo $tenlop; ?> </h2>
 
        <table class=" table table-bordered table-hover text-center table-responsive"> 
        
            <tr class="bg bg-secondary text-light">
            <!-- <th scope="col">Mã sinh viên</th> -->
            <th scope="col">Mã số sinh viên</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Lớp</th>
            <!-- <td scope="col" >Edit</td> -->
            </tr>
        <?php
            if(isset($_GET['maLop']) && isset($_GET['maMon']) && isset($_SESSION['maGV'])):
                $malop=$_GET['maLop'];
                $mamon=$_GET['maMon'];
                $magv=$_SESSION['maGV'];
                $db= new giaovien();
                $result= $db->listSinhViens($magv,$malop,$mamon);
                while ($set=$result->fetch()): 
            ?>
            <tr>
            <!-- <td><?php //echo $set['maHS'] ?> </td> -->
            <td ><?php echo $set['maHS'] ?> </td>
            <td><?php echo $set['tenHS'] ?> </td>
            <td><?php echo $set['diachi'] ?></td>
            <td><?php echo $set['email'] ?></td>
            <td><?php echo $set['tenlop'] ?></td>
            </tr>
        
            <?php
        endwhile;
        ?>
       
        <?php
            endif;
        ?>
       
  
        </table>
        </div>
        <div class="">

        </div>
        
     
    </div>
    
</section>