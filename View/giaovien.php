<?php 
  if(!isset($_SESSION['maGV']))
  {
    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login_gv&act=login_gv"/>';
  }
?>
<section >
    <div class="container-fluid  row">
        <aside class="col-lg-3 col-md-3 mt-md-5">
            <table class="table table-bordered shadow mt-4 text-center">
                <colgroup>
                    <col style="width:40%">
                </colgroup>
                <thead>
                    <tr align="center">
                        <td colspan="2" class="title-infor">
                            <h3>Thông Tin Giáo Viên</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Họ và Tên</b></td>
                        <td><?php echo $_SESSION['tenGV']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Mã giáo viên</b></td>
                        <td><?php echo $_SESSION['maGV']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Chức vụ</b></td>
                        <td>
                            <?php 
                                if($_SESSION['role']==1)
                                {
                                    echo "Giáo Viên";
                                }
                                if($_SESSION['role']==2)
                                {
                                    echo "Hiệu Trưởng";
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="list-group list-group-flush shadow h-hover text-center">
                <a class="list-group-item list-group-item-action list-group-item-dark bg bg-primary">XEM ĐỀ THI</a>
                <a href='index.php?action=nhapde' class="list-group-item list-group-item-action list-group-item-dark bg bg-warning">TẠO ĐỀ THI</a>
                <a  href="index.php?action=giaovien&act=danhsachmon" class="list-group-item list-group-item-action list-group-item-dark bg bg-info">DANH SÁCH MÔN DẠY</a>
            </div>
        </aside>
        <aside class="col-lg-9 col-md-9">
            <h2 class="text-center text-danger mb-4"><b>Đề Thi</b></h2>
            <div class="row">
                <?php
                if(isset($_SESSION['maGV'])):
                $magv=$_SESSION['maGV'];
                $dt = new de();
                $result = $dt->displayDeGV($magv);
                while ($set = $result->fetch()) :
                ?>
                    <div class="card col-border col-md-3 shadow" style="width: 18rem;">
                        <img src="assets/img/6.jpg" class="card-img-top" alt="#">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $set['tenMon']; ?></h5>
                            <div class="card-body">
                                <p class="card-text">Mã đề: <?php echo $set['maDe'] ?></p>
                                <p class="card-text">Số câu hỏi: <?php echo $set['soluongcauhoi']; ?></p>
                                <p class="card-text">Thời gian thi: <?php echo $set['thoigian']; ?></p>
                                <p class="card-text">Lớp: <?php echo $set['tenLop']; ?></p>
                                <p class="card-text">Giáo viên: <?php echo $set['tenGV']; ?></p>
                            </div>
                            <a href="index.php?action=dethi&act=dethi&made=<?php echo $set['maDe'] ?>" class="btn btn-outline-dark text-center">Xem</a>
                            <?php 
                                $kt=new giaovien();
                                $res =$kt->kiemtraTimer($set['maDe']);
                                if($res>0){
                                    echo '<a href="index.php?action=giaovien&act=updateTimer&made='.$set['maDe'].'" class="btn btn-outline-primary">Update timer</a>';
                                }
                                else if($res==0)
                                {
                                    echo '<a href="index.php?action=giaovien&act=timer&made='.$set['maDe'].'" class="btn btn-outline-success">Set timer</a>';
                                }
                            ?>
                            <a href="index.php?action=dethi&act=delete_de&made=<?php echo $set['maDe'] ?>" 
                        onclick="return confirm('Bấm vào nút OK để tiếp tục');" class="btn btn-outline-danger">Xóa</a>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
                <?php endif; ?>
            </div>
        </aside>
    </div>
</section>