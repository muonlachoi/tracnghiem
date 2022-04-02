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
        <h5>NHẬP DANH SÁCH GIÁO VIÊN </h5>
        <form action="index.php?action=giaovien&act=importGV" method="post" enctype="multipart/form-data">
            <div class="input-group input-group-sm mb-md-3 ">
                <input type="file" class="form-control form-control-sm" name="upload" id="upload">
                <input type="submit" name="submit" value="Import" class="input-group-text">
            </div>
        </form>
        <div class="row">
            <h2 class="text-center text-danger mb-md-3">THÔNG TIN GIÁO VIÊN  </h2>
            <table class=" table table-bordered table-hover text-center"> 
                <thead>
                    <tr>
                        <!-- <th scope="col">Mã sinh viên</th> -->
                        <th scope="col">Mã giáo viên</th>
                        <th scope="col">Họ tên giáo viên</th>
                        <th scope="col">Tài khoản</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <?php
                    $db = new giaovien();
                    $result=$db->listGiaoVien(); 
                    while($set = $result->fetch()):
                ?>
                <tbody>
                    <tr>
                        <td> <?php echo $set['maGV'] ?></td>
                        <td>  <?php echo $set['tenGV'] ?></td>
                        <td>  <?php echo $set['user'] ?></td>
                        <td>  <?php echo $set['pass'] ?></td>
                        <td>  
                            <?php 
                                if($set['role']==1)
                                {
                                    echo "Giáo Viên";
                                }
                                if($set['role']==2)
                                {
                                    echo "Hiệu Trưởng";
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="index.php?action=giaovien&act=update&maGV=<?php echo $set['maGV'];  ?>" class="btn btn-warning mb-md-1">Sửa</a>
                            <a href="index.php?action=giaovien&act=deleteGV&maGV=<?php echo $set['maGV']?>" 
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