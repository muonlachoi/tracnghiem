
<section >
    <div class="container-fluid row">
        <?php
        $dem=1;
          if(isset($_GET['maDe']))
          {
              $made=$_GET['maDe'];
              $db= new cauhoi();
              $result=$db->Question($made);
              $tenmon=$result['tenMon'];
              $soluong=$result['soluongcauhoi'];
              $thoigian=$result['thoigian'];
             
            // echo $tenmon;
            $gv=new giaovien();
              $res=$gv->getTimer($made);
              while($time=$res->fetch()){
                $date = $time['date'];
                $hour=$time['hour'];
                $min = $time['minutes'];
                $sec = $time['seconds'];
              }
              //thời gian làm bài thi
              $_SESSION['thoigian']=$thoigian;
              $_SESSION['start_time']=date("$date $hour:$min:$sec");
              $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["thoigian"]."minutes",strtotime($_SESSION["start_time"])));
              $_SESSION['end_time']=$end_time;
              //thời gian xem đáp án của bài thi khi hết thời gian xem nó sẽ ẩn các bài thi đi
              $_SESSION['tgxemdapan']=30;
              $time_xemdapan=$time_xemdapan=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["tgxemdapan"]."minutes",strtotime($_SESSION["end_time"])));
              $_SESSION['tg_xemdapan']=$time_xemdapan;
              //thoi gian kết thúc
              $timeEnd=strtotime($_SESSION['end_time']);
              $tg_xemdapan=strtotime($_SESSION['tg_xemdapan']);
            
              $rightnow=time();
              //nếu hết thời gian nó hiện kết quả lên
             if($rightnow<$timeEnd)
             {
                 $display='none';
             }
             elseif($rightnow>$tg_xemdapan){
                $hethan='none';
             }
             else{

                 $btn='none';
                 $display='block';
             }
            
              
          }
        ?>
        <div class="col-md-12 bg bg-dark pt-3 text-light" style="height: 250px">
            <h1 class="mt-md-5 text-center">Bài Kiểm Tra - <?php echo $tenmon; ?></h1>
            
            <div>
                <h5 class=" mt-md-3 offset-3">Số câu hỏi: <?php echo $soluong; ?> - Thời gian: <?php echo $thoigian; ?> Phút - Thời gian còn lại: <span id='timer' class="text-md-end"></span></h5>
            </div>
        </div>
        <div class="col-md-12">
            <h6 class="mt-md-3 text-md-center">Hi: <?php echo $_SESSION['tenHS']; ?>. Chào mừng đã đến với bài kiểm tra hôm nay.</h6>
        </div>
        <!-- ẩn đi các câu hỏi khi hết thời gian làm bài -->
        <div style="display:<?php echo $hethan; ?>" class="col-md-10 offset-1 ms-5">
        <form name="myForm" id="nop" action="index.php?action=baithi&act=nopbai&maDe=<?php echo $_GET['maDe']?>"  method="post">
            <?php 
                $kq=$db->listQuestions($made);
                while($set=$kq->fetch()):
            
            ?>
            <table class="mt-md-4">
                <span type="hidden" ><?php $set['maND'] ?></span>
                <tr>
                    <td colspan="2"><h5><?php echo $dem++; ?>. <?php echo $set['noidungcauhoi']; ?>? </h5></td>
                </tr>
                <tr>
                    <td style="height: 40px; width:40px" class="text-md-end"><h6 ><input type="radio"   value="<?php echo $set['dapanA'];?>" name="chon[<?php echo $set['maND']; ?>]" <?php if($_SESSION['checkeds'][$set['maND']]==$set['dapanA']){echo 'checked="checked"';} ?> id="" ></h6> </td>
                    <td ><h6  class="ms-md-2 " style="margin-bottom:15px"><b><?php echo $set['dapanA']; ?></b></h6> </td>
                </tr>
                <tr>
                    <td style="height: 40px; width:40px" class="text-md-end"><h6 ><input type="radio"  value="<?php echo $set['dapanB']; ?>" name="chon[<?php echo $set['maND']; ?>]" <?php if($_SESSION['checkeds'][$set['maND']]==$set['dapanB']){echo 'checked="checked"';} ?> id=""></h6> </td>
                    <td ><h6  class="ms-md-2 " style="margin-bottom:15px"><b> <?php echo $set['dapanB']; ?></b></h6> </td>
                </tr>
                <tr>
                    <td style="height: 40px; width:40px" class="text-md-end"><h6 ><input type="radio"  value="<?php echo $set['dapanC']; ?>" name="chon[<?php echo $set['maND']; ?>]" <?php if($_SESSION['checkeds'][$set['maND']]==$set['dapanC']){echo 'checked="checked"';} ?> id=""></h6> </td>
                    <td ><h6  class="ms-md-2 " style="margin-bottom:15px"><b> <?php echo $set['dapanC']; ?></b></h6> </td>
                </tr>
                <tr>
                    <td style="height: 40px; width:40px" class="text-md-end"><h6 ><input type="radio"  value="<?php echo $set['dapanD']; ?>" name="chon[<?php echo $set['maND']; ?>]" <?php if($_SESSION['checkeds'][$set['maND']]==$set['dapanD']){echo 'checked="checked"';} ?> id=""></h6> </td>
                    <td ><h6  class="ms-md-2 " style="margin-bottom:15px"><b> <?php echo $set['dapanD']; ?></b></h6> </td>
                </tr>
                <tr>
                    <td colspan="2"><h6 class="ms-md-2" style="margin-bottom:15px; text-transform: uppercase;display:<?php echo $display; ?>" id="ketqua"><?php echo "Đáp án: ".$set['ketqua']; ?></h6></td>
                </tr>
            </table>

            <?php endwhile; ?>
            <!-- ẩn nút nộp bài khi hết giờ làm bài -->
            <div class="text-md-center mb-md-4 mt-md-4"><input class="btn btn-primary" type="submit"  name="nopbai" style="display:<?php echo $btn ?>" value="Nộp Bài"></div>
            
        <script>
            var countDownDate = <?php echo $timeEnd=strtotime($_SESSION['end_time']) ?> * 1000;
            var now = <?php echo time() ?> * 1000;

            // Update the count down every 1 second
            var interval = setInterval(function() {
            now = now + 1000;
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="demo"
            document.getElementById("timer").innerHTML =hours + ":" +
            minutes + ":" + seconds;
            if(distance==0){
                document.forms["myForm"].submit();
            }
            // If the count down is over, write some text 
            if (distance < 0) {
            
            clearInterval(interval);
            document.getElementById("timer").innerHTML = "<b class='text-danger'>HẾT THỜI GIAN LÀM BÀI</b>";
            }
               
            }, 1000);
            
        </script>
        </form>
        </div>
    </div>
</section>
