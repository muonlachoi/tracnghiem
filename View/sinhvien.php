<?php 
  if(!isset($_SESSION['maHS']))
  {
    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login_sv&act=login_sv"/>';
  }
?>
<section >
    <div class="container-fluid row">
        <article class="col-lg-3 col-md-3  ">
            <table class="table table-bordered shadow text-center mt-5">
                <colgroup>
                    <col style="width:35%">
                </colgroup>
                <thead class="table">
                    <tr align="center">
                        <td colspan="2" >
                            <h3>Thông Tin Sinh Viên</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Họ và Tên</b></td>
                        <td><?php echo $_SESSION['tenHS']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Mã sinh viên</b></td>
                        <td><?php echo $_SESSION['maHS']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Lớp</b></td>
                        <td><?php echo $_SESSION['tenLop']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $_SESSION['email']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Địa chỉ</b></td>
                        <td><?php echo $_SESSION['diachi']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="list-group list-group-flush shadow h-hover text-center">
                <a class="list-group-item list-group-item-action list-group-item-success bg bg-primary" href=""><b>ĐỀ THI</b></a>
                <a class="list-group-item list-group-item-action list-group-item-secondary bg bg-info" href="index.php?action=baithi&act=diemthi"><b>XEM ĐIỂM THI</b></a>
                <a class="list-group-item list-group-item-action list-group-item-secondary bg bg-warning" href=""><b>LIÊN HỆ</b></a>
            </div>
        </article>
        <aside class="col-lg-9 col-md-9">
            <h2 class="text-md-center text-danger mb-3">Đề Thi</h2>
            <div class="row">
            
            <?php
            if(isset($_SESSION['maHS'])):
              $mahs=$_SESSION['maHS'];
              
              $tenlop=$_SESSION['tenLop'];

              $dt= new de();
              $result=$dt->displayDeSV($tenlop);
              while($set=$result->fetch()):
                $date = $set['date'];
                $hour=$set['hour'];
                $min = $set['minutes'];
                $sec = $set['seconds'];
                $thoigian=$set['thoigian'];
                // $now=time();
                
                
                
                
            ?>
            <?php
                // $_SESSION['thoigian']=$thoigian;
                $startTime=date("$date $hour:$min:$sec");
                // $_SESSION['start_time']=date("$date $hour:$min:$sec");
                $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$thoigian."minutes",strtotime($startTime)));
                // $_SESSION['end_time']=$end_time;
                //thời gian xem đáp án của bài thi khi hết thời gian xem nó sẽ ẩn các bài thi đi
                //thời gian xem đáp án
                $tgxemdapan=30;
                $time_xemdapan=$time_xemdapan=date('Y-m-d H:i:s', strtotime('+'.$tgxemdapan."minutes",strtotime($end_time)));
                // $_SESSION['tg_xemdapan']=$time_xemdapan;
                //thoi gian kết thúc
                // $timeEnd=strtotime($_SESSION['end_time']);
                $tg_xemdapan=strtotime($time_xemdapan);
                
                //thoi gian kết thúc
                $timeEnd=strtotime($end_time);
                // $timeEnd=strtotime($_SESSION['end_time']);
                $rightnow=time();
                $timer=strtotime("$date $hour:$min:$sec" );
                // echo $timer;
                //nếu hết thời gian nó hiện kết quả lên
                // $display='block';
                if($rightnow>$timeEnd)
                {
                    $kt=new ketqua();
                    $kiemtra=$kt->kiemTraThi($mahs,$set['maMon'],$set['maDe'],$set['maGV']);
                    if($kiemtra==0)
                    {
                        $display='none';
                        // unset($_SESSION['thoigian']);
                        // unset($_SESSION['start_time']);
                        // unset($_SESSION['end_time']);
                    }
                }
                elseif($rightnow>=$timer)
                {
                    $display='block';
                }
                else if($rightnow<$timer){
                    $display='none';
                }
            ?>
            <div class="card col-lg-3 col-md-3 col-border shadow"  style="width: 18rem;display:<?php echo $display; ?>;" >
                <img src="assets/img/6.jpg" class="card-img-top" alt="...">
                <div class="card-body text-md-center">
                    <h5 class="card-title"><?php echo $set['tenMon']; ?></h5>
                        <div class="card-body">
                            <p class="card-text">Mã đề: <?php echo $set['maDe'] ?></p>
                            <p class="card-text">Số câu hỏi: <?php echo $set['soluongcauhoi']; ?></p>
                            <p class="card-text">Thời gian thi: <?php echo $set['thoigian']; ?> phút</p>
                            <p class="card-text">Lớp: <?php echo $set['tenLop']; ?></p>
                            <p class="card-text">Sỉ số: <?php echo $set['siso']; ?></p>
                            <p class="card-text">Giáo viên: <?php echo $set['tenGV']; ?></p>
                            <p class="card-text">Ngày thi: <?php echo $set['date']; ?><br> <?php echo $set['hour']; ?> giờ : <?php echo $set['minutes']; ?> phút </p></b>
                        </div>
                    <?php
                        $kt=new ketqua();
                        $kiemtra=$kt->kiemTraThi($mahs,$set['maMon'],$set['maDe'],$set['maGV']);
                        if($kiemtra==0)
                        {
                            echo '<a href="index.php?action=baithi&act=baithi&maDe='.$set['maDe'].'" class="btn btn-outline-primary">Kiểm tra</a>';
                        }
                        else if($kiemtra>0 && $rightnow>$timeEnd && $rightnow<=$tg_xemdapan){
                            echo '<a href="index.php?action=baithi&act=baithi&maDe='.$set['maDe'].'" class="btn btn-outline-primary">Xem đáp án</a>';
                        }
                        else if($kiemtra>0 && $rightnow>$tg_xemdapan)
                        {
                            echo '<h4 style="color: rgb(236, 18, 18);">Bạn đã kiểm tra rồi</h3>';
                        }
                    ?>
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

        
        