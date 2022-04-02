<?php
    
?>
    <div class="container">
        <div class="row">
            
            <!-- set time -->
            <div style="display:flex; justify-content: center;">
            <form method="POST" action="index.php?action=giaovien&act=setTimer" name="uptimer">
            <h2 class="text-center bg text-danger">SET TIMER</h2>
                <table class="col-md-4 table table-borderless">
                    <input type="hidden" name="id" >
                    <input type="hidden" name="made" value="<?php if(isset($_GET['made'])) {echo $_GET['made'];} ?>" >
                    <tr>
                        <th class>Ngày*:</th>
                        <td> <input class=" form-control" style="width:200px; margin-left:50px" type="date" name="date"></td>
                        <td><span class="error"><?php if(isset($dateErr)) echo $dateErr; ?></span></td>
                    </tr>
                    <tr>
                        <th>Giờ*:</th>
                        <td>
                            <input class=" form-control" style="width:200px; margin-left:50px" type="number" name="h">
                        </td>
                        <td>
                            <span class="error"><?php if(isset($hourErr)) echo $hourErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Phút*:</th>
                        <td>
                            <input class=" form-control" style="width:200px; margin-left:50px" type="number" name="m">
                            
                        </td>
                        <td>
                            <span class="error"><?php if(isset($minErr)) echo $minErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Giây*:</th>
                        <td><input class=" form-control" style="width:200px; margin-left:50px" type="number" value=0 name="s"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan=2 class="text-center"><button type="submit" class="btn btn-primary" name="setTime">Set Timer</button></td>
                        
                    </tr>
                   
                </table>
                </form>
            </div>
            <br>
            <br>
            
        </div>
    </div>

