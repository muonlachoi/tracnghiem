<?php 
  if(isset($_GET['made'])):
  $made=$_GET['made'];
  $db=new giaovien();
  $result =$db->getTimer($made);
  while($set = $result->fetch()) {
  $id=$set['id'];
  $date = $set['date'];
  $hour=$set['hour'];
  $min = $set['minutes'];
  $sec = $set['seconds'];
  $maDe = $set['maDe'];
  }
?>
    <div class="container">
        <div class="row">
           <!-- update timer -->
           <div class="col-md-12 text-center">
           <h2 class="text-center bg text-danger">TIMER</h2>
                <span id="demo"> </span>
            </div>
            <div style="display:flex; justify-content: center;">
            <form method="POST" action="index.php?action=giaovien&act=update_timer&made=<?php echo $maDe ?>" name="uptimer" >
            <h2 class="text-center bg text-danger">Update Timer</h2>
                <table class=" table table-borderless col-md-4">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="made" value="<?php echo $made;?>">
                    <tr>
                        <th class>Ngày*:</th>
                        <td> <input class=" form-control" style="width:200px; margin-left:20px" type="date" name="date" value="<?php echo $date;?>"></td>
                        <td><span class="error"><?php if(isset($dateErr)) echo $dateErr; ?></span></td>
                    </tr>
                    <tr>
                        <th>Giờ*:</th>
                        <td><input class=" form-control" style="width:200px; margin-left:20px" type="number" name="h" value="<?php echo $hour;?>"></td>
                        <td>
                            <span class="error"><?php if(isset($hourErr)) echo $hourErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Phút*:</th>
                        <td><input class=" form-control" style="width:200px; margin-left:20px" type="number" name="m" value="<?php echo $min;?>"></td>
                        <td>
                            <span class="error"><?php if(isset($minErr)) echo $minErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Giây*:</th>
                        <td><input class=" form-control" style="width:200px; margin-left:20px" type="number" name="s" value="<?php echo $sec;?>"></td>
                    </tr>
                    <tr>
                        <td colspan=2 class="text-center"><button type="submit" class="btn btn-primary mt-2" name="update">Update</button></td>
                    </tr>
                   
                </table>
                </form>
            </div>
            </div>
    </div>
<script>
    var countDownDate = <?php echo strtotime("$date $hour:$min:$sec" ); ?> * 1000;
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var interval = setInterval(function() {
    now = now + 1000;
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
    minutes + "m " + seconds + "s ";
    // If the count down is over, write some text 
    if (distance < 0) {
    clearInterval(interval);
    document.getElementById("demo").innerHTML = "HẾT HẠN";
    }
        
    }, 1000);

</script>
<?php endif; ?>