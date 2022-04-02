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
    <div class=container>
        <h2 class="text-center">CÁC NĂM HỌC</h2>
        
        <div>
            <table class="table text-center">
                <tr>
                    <th>STT</th>
                    <th>HỌC KỲ</th>
                    <th>EDIT</th>
                </tr>
                <?php 
                    $stt=1;
                    if(isset($_GET['id_namhoc'])):
                    $idnh=$_GET['id_namhoc'];
                    $sv= new phancong();
                    $res=$sv->hocky($idnh); 
                    while($set = $res->fetch()):
                        
                ?>
                <tr>
                    <td class="text-center"><?php echo $stt++ ?></td>
                    <td class="text-center text-uppercase"><a href="index.php?action=phancong&act=dsmon&id_namhoc=<?php echo $set['id_namhoc']; ?>&id_hocky=<?php echo $set['id_hocky']; ?>"><?php echo $set['hocky']?></a></td>
                    
                    <td class="text-center">
                    
                        <a href="index.php?action=phancong&act=updatehk&id_hocky=<?php echo $set['id_hocky'];  ?>" class="btn btn-warning ">Sửa</a>
                        <a href="index.php?action=phancong&act=delete_hocky&id_namhoc=<?php echo $set['id_namhoc']; ?>&id_hocky=<?php echo $set['id_hocky']; ?>" 
                        onclick="return confirm('Bấm vào nút OK để tiếp tục');" class="btn btn-danger ">Xóa</a>
                        
                    </td>
                </tr>
                
                <?php
                    endwhile;
                ?>
                <tr>
                    <td colspan=3><a href="index.php?action=phancong&act=themhocky" class="btn btn-success mb-md-1">Thêm học kỳ</a></td>
                </tr>
                <?php
                    endif;
                ?>
            </table>
        </div>
        </div>
</div>