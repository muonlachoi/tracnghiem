<section>
    <div class="container">
        <div class="row">
        <h3 class="text-center text-danger mb-md-3 text-uppercase" >DANH SÁCH ĐIỂM SINH VIÊN CỦA <?php echo $_SESSION['tenGV']; ?></h3>
        <div class="mb-2"  style="display:flex;justify-content:end">
        <div class="dropdown col-md-3 ">
            <a class="btn btn-secondary w-100 text-start form-select text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="ms-3">Danh sách môn</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
            if(isset($_SESSION['maGV']))
                $magv=$_SESSION['maGV'];
                $db= new giaovien();
                $result=$db->dsMon($magv); 
                while($set = $result->fetch()):
            ?>
                <li><a class="dropdown-item" href="index.php?action=giaovien&act=caclopday&maMon=<?php echo $set['maMon'] ?>"><?php echo $set['tenMon'];?></a></li>
                
            <?php endwhile; ?>
            </ul>
            
            </div>
        </div>

        <table class=" table table-bordered text-center"> 
        
            <tr class="bg bg-secondary text-light">
            <th scope="col">Mã Môn Dạy </th>
            <th scope="col">Tên môn Dạy</th>
            <th scope="col">Xem các lớp dạy</th>
            
            </tr>
        <?php
            if(isset($_SESSION['maGV'])):
                $magv=$_SESSION['maGV'];
                $db= new giaovien();
                $result=$db->dsMon($magv); 
                while($set = $result->fetch()):
        ?>
            <tr>
                <td class="h6"><?php echo $set['maMon'] ?> </td>
                <td class="h6"><?php echo $set['tenMon'] ?> </td>
                <td><a class="link-light btn btn-primary  text-decoration-none" href="index.php?action=giaovien&act=caclopday&maMon=<?php echo $set['maMon'] ?>"><span class="h6">Xem</span></a></td>
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