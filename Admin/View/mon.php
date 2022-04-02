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
        <div class="row">
             <h2 class="text-center text-danger mb-md-3">DANH SÁCH MÔN  </h2>
             <table class=" table table-bordered table-hover text-center"> 
                <thead>
                    <tr>
                        <!-- <th scope="col">Mã sinh viên</th> -->
                        <th scope="col">Mã môn</th>
                        <th scope="col">Tên môn</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <?php
                        $db = new mon();
                        $result=$db->xemMon(); 
                        while($set = $result->fetch()):
                ?>
                <tbody>
                    <tr>
                        <!-- <td><?php //echo $set['maHS'] ?> </td> -->
                        <td> <?php echo $set['maMon'] ?></td>
                        <td>  <?php echo $set['tenMon'] ?></td>
                        
                        <td class="text-center">
                                    <a href="index.php?action=mon&act=update&maMon=<?php echo $set['maMon'];  ?>" class="btn btn-warning mb-md-1">Sửa</a>
                                    <a href="index.php?action=mon&act=delete_mon&maMon=<?php echo $set['maMon']?>" 
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