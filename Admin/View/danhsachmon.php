<?php 
    if(!isset($_SESSION['admin']))
    {
        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login"/>';
    }
?>
<div class="col-lg-3">
    <?php
        include "View/sidebar.php";
    ?>
</div>
<div class="col-lg-9">
    <section>
        <div class="container-fluid">
            <div>
                <h3>IMPORT DANH SÁCH PHÂN CÔNG</h3>
                <form action="index.php?action=phancong&act=importPC" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-sm mb-md-3 ">
                        <input type="file" class="form-control form-control-sm" name="uploadfile" id="uploadfile">
                        <input type="submit" name="submit" value="Import" class="input-group-text">
                    </div>
                </form>
            </div>
            
            <div class="row">
            <?php 
                
                if (isset($_GET['id_namhoc']) &&  isset($_GET['id_hocky'])) {
                    $id_namhoc = $_GET['id_namhoc'];
                    $id_hocky = $_GET['id_hocky'];
                    $db = new phancong();
                    $result = $db->listPC1($id_namhoc,$id_hocky);
                    $magv = $result[0];
                    $mamon = $result[1];
                    $malop = $result[2];
                    $hocky = $result[3];
                    $namhoc = $result[4];
                    
                }
            ?>
                <h2 class="text-center text-danger mb-md-3">DANH SÁCH PHÂN CÔNG  </h2>
                <table class=" table table-bordered table-hover text-center"> 
                    <thead>
                        <tr>
                            <!-- <th scope="col">Mã sinh viên</th> -->
                            <th scope="col">Mã giáo viên</th>
                            <th scope="col">Tên giáo viên</th>
                            <th scope="col">Mã môn</th>
                            <th scope="col">Mã lớp</th>
                            <th scope="col">Học kỳ</th>
                            <th scope="col">Năm học</th>
                            <th scope="col"><a href="index.php?action=phancong&act=add_phancong">THÊM PHÂN CÔNG</a></th>
                        </tr>
                    </thead>
                  
                    <?php
                        if(isset($_GET['id_hocky']) && isset ($_GET['id_namhoc'])):
                            $id_hocky=$_GET['id_hocky'];
                            $id_namhoc=$_GET['id_namhoc'];
                            $db = new phancong();
                            $result=$db->danhsachday($id_hocky,$id_namhoc); 
                            while($set = $result->fetch()):
                    ?>
                    <tbody>
                      
                        <tr>
                            <!-- <td><?php //echo $set['maHS'] ?> </td> -->
                            <td> <?php echo $set['maGV'] ?></td>
                            <td> <?php echo $set['tenGV'] ?></td>
                            <td>  <?php echo $set['maMon'] ?></td>
                            <td><?php echo $set['maLop'] ?></td>
                       
                            <td><?php echo $hocky ?></td>
                            <td><?php echo $namhoc ?></td>
                        <input type="hidden" value="<?php echo $set['id_namhoc'] ?>">
                            <td class="text-center">
                        <a class="btn btn-warning" href="index.php?action=phancong&act=updatepc&id_namhoc=<?php echo $set['id_namhoc']; ?>&id_hocky=<?php echo $set['id_hocky']; ?>&id_pc=<?php echo $set['id_pc']; ?>">Sửa</a>
                        <a href="index.php?action=phancong&act=deletePC&id_namhoc=<?php echo $set['id_namhoc']; ?>&id_hocky=<?php echo $set['id_hocky']; ?>&id_pc=<?php echo $set['id_pc']; ?>" 
                        onclick="return confirm('Bấm vào nút OK để tiếp tục');" class="btn btn-danger">Xóa</a>
                    </td>
                            
                        
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
</div>