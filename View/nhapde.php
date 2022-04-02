<section >
    <div class="container " style='display:flex;justify-content:center'>
            <form action="index.php?action=nhapde&act=dangkydethi" method="post" name='dk_dethi' class="form mb-md-5 ">
                <table class=" table table-borderless text-md-center mt-md-5 ">
                    <tr class="text-md-center"><th colspan=3><h2>Nhập thông tin đề thi</h2></th><td></td></tr>
                    <tr  >
                        <td class="text-md-end" style="width:300px"><b>Mã Đề:</b></td>
                        <td style="width:300px"><input class="form-control "  placeholder="Mã đề" type="text" name="maDe" ></td>
                        <td class="text-md-start"><span class="error"><?php if(isset($madeErr)) echo $madeErr; ?></span></td>
                    </tr>
                    <tr>
                       <td class=text-md-end><b>Mã Môn: </b></td>
                       <td class="text-md-start">
                            <select name="maMon" class="form-control"  size="1" >
                            <?php
                                $db= new giaovien();
                                $result=$db->nhapMon($_SESSION['maGV']); 
                                while($set = $result->fetch()):
                             ?>
                            <option value="<?php echo $set['maMon'];?>">
                            <?php echo $set['tenMon'];?>
                            </option>
                            <?php
                                endwhile;
                            ?>
                              </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class=text-md-end><b>Số lượng câu hỏi:</b></td>
                        <td><input class="form-control" type="text" name="soluongcauhoi" placeholder="Số câu hỏi" ></td>
                        <td class="text-md-start"><span class=error><?php if(isset($slchErr)) echo $slchErr; ?></span></td>
                    </tr>
                    <tr>
                        <td class=text-md-end><b>Thời gian: </b></td>
                        <td> <input class="form-control" type="text" name="thoigian" placeholder="Thời gian"></td>
                        <td class="text-md-start"><span class=error><?php if(isset($timeErr)) echo $timeErr; ?></span></td>
                    </tr>
                    
                        <input class="form-control" type="hidden" value="0" name="kichhoat" >
                        <input class="form-control" type="hidden" name="maGV" value=<?php echo $_SESSION['maGV']?> >
                    
                    <tr>
                        <td class=text-md-end><b>Lớp học:</b></td>
                        
                        <td class="text-md-start">
                            <select class="form-control w-50"  name="maLop" size="1" id="">
                            <?php
                                $sv= new giaovien();
                                $res=$sv->nhapLop($_SESSION['maGV']); 
                                 while($set = $res->fetch()):
                             ?>
                            <option value="<?php echo $set['maLop']; ?>">
                                <?php echo  $set['tenLop'];?>
                            </option>
                            <?php
                               endwhile;
                            ?>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr class="text-md-center">
                        <td colspan=3><input type="submit" name="submit" class="btn btn-primary dangky mt-2" value="Đăng Ký"></td>
                    </tr>
                </table>
            </form>
            
        </div>
</section>