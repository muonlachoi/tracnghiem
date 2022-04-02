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
    <div class=container-fluid>
        <h2 class="text-center">CÁC NĂM HỌC</h2>
        <table class="table text-center">
            <tr>
                <th>STT</th>
                <th>NĂM HỌC</th>
                <td>EDIT</td>
            </tr>
            <?php 
                $stt=1;
                $sv= new phancong();
                $res=$sv->namhoc(); 
                while($set = $res->fetch()):
            ?>
            <tr>
                <td><?php echo $stt++ ?></td>
                <td><a href="index.php?action=phancong&act=hocky&id_namhoc=<?php echo $set['id_namhoc']; ?>"><?php echo $set['namhoc']?></a></td>
                <td class="text-center">
                
                    <a href="index.php?action=phancong&act=updatenh&id_namhoc=<?php echo $set['id_namhoc'];  ?>" class="btn btn-warning mb-md-1">Sửa</a>
                    
                </td>
            </tr>
            <?php
                endwhile;
            ?>
        </table>
    </div>
</div>