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
            <h2 class="text-center text-danger mb-md-3">DANH SÁCH LỚP</h2>
            <table class=" table table-bordered table-hover text-center"> 
                <thead>
                    <tr>
                        <!-- <th scope="col">Mã sinh viên</th> -->
                        <th scope="col">Mã lớp</th>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Sỉ số</th>
                        <th scope="col">Danh sách lớp</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <?php
                    $db = new lop();
                    $result=$db->xemLop(); 
                    while($set = $result->fetch()):
                ?>
                <tbody>
                    <tr>
                        <!-- <td><?php //echo $set['maHS'] ?> </td> -->
                        <td> <?php echo $set['maLop'] ?></td>
                        <td>  <?php echo $set['tenLop'] ?></td>
                        <td>  <?php echo $set['siso'] ?></td>
                        <td> <a class="text-decoration-none" href="index.php?action=sinhvien&act=sinhvien&maLop=<?php echo $set['maLop'] ?>&tenLop=<?php echo $set['tenLop'] ?>">Xem danh sách lớp</a></td>
                        <td class="text-center">
                            <a href="index.php?action=lop&act=update&maLop=<?php echo $set['maLop'];  ?>" class="btn btn-warning mb-md-1">Sửa</a>
                            <a href="index.php?action=lop&act=delete_lop&maLop=<?php echo $set['maLop']?>" 
                            onclick="return confirm('Bấm vào nút OK để tiếp tục');" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>     
    </section>
</div>