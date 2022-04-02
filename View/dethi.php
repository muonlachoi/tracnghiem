<section>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['made'])) {
                $maDe = $_GET['made'];
                $dt = new de();
                $result = $dt->getListDe($maDe);
                $tenMon = $result[1];
                $soluongcauhoi = $result[2];
                $thoigian = $result[3];
                $tenLop = $result[4];
                $tenGV = $result[5];
            }
            ?>
            <h2 class="text-center text-danger"><b>Đề Thi</b></h2>
            <div >
                <div class="col-md-4 mb-md-4 bg bg-success text-center text-light p-md-3 offset-4 border border-primary shadow rounded">
                    <table class=text-center >
                        <tr>
                            <td style="width:220px"><b>Mã đề: </b></td>
                            <td class="text-center"><p><?php echo $maDe; ?></p></td>
                        </tr>
                        <tr>
                            <td><b>Môn: </b></td>
                            <td ><p><?php echo $tenMon; ?></p></td>
                        </tr>
                        <tr>
                            <td><b>Số câu hỏi: </b></td>
                            <td class="text-center"><p><?php echo $soluongcauhoi; ?></p></td>
                        </tr>
                        <tr>
                            <td><b>Thời gian: </b></td>
                            <td class="text-center"><p><?php echo $thoigian; ?></p></td>
                        </tr>
                        <tr>
                            <td><b>Lớp: </b></td>
                            <td class="text-center"><p><?php echo $tenLop; ?></p></td>
                        </tr>
                        <tr>
                            <td><b>Giáo viên: </b></td>
                            <td class="text-center"><p><?php echo $tenGV; ?></p></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5 mb-md-4">
                    <h6>Nhập danh sách câu hỏi:</h6>
                    <form action="index.php?action=dethi&act=insert_CH&made=<?php echo $maDe ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-sm mb-md-4 ">
                            <input type="file" class="form-control form-control-sm" name="file" id="file">
                            <input type="submit" name="submit" value="Upload" class="input-group-text">
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="body shadow">
                <table class="table ">
                        <tr class="bg bg-secondary text-center text-light ">
                            <th width="75px">Mã câu hỏi</th>
                            <th >Câu hỏi</th>
                            <th width="160px">Đáp án A</th>
                            <th width="160px">Đáp án B</th>
                            <th width="160px">Đáp án C</th>
                            <th width="160px">Đáp án D</th>
                            <th width="100px">Kết quả</th>
                            <th width="75px"></th>
                        </tr>
                <?php
                    $ch = new cauhoi();
                    $results = $ch -> displayCauhoi($maDe);
                    $dem=1;
                    while ($set = $results->fetch()):
                ?>
                        <tr>
                            <td class="text-center"><?php echo $dem++ ?></td>
                            <td><?php echo $set['noidungcauhoi']; ?></td>
                            <td class="text-center"><?php echo $set['dapanA']; ?></td>
                            <td class="text-center"><?php echo $set['dapanB']; ?></td>
                            <td class="text-center"><?php echo $set['dapanC']; ?></td>
                            <td class="text-center"><?php echo $set['dapanD']; ?></td>
                            <td class="text-center"><?php echo $set['ketqua']; ?></td>
                            <td class="text-center">
                                <a href="index.php?action=dethi&act=edit&mand=<?php echo $set['maND'];  ?>" class="btn btn-warning mb-md-1">Sửa</a>
                                <a href="index.php?action=dethi&act=delete_cauhoi&mand=<?php echo $set['maND']; ?>&made=<?php echo $maDe ?>" 
                                onclick="return confirm('Bấm vào nút OK để tiếp tục');" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                <?php
                endwhile;
                ?>
                </table>
                <div class="text-center "><a href="index.php?action=nhapde&act=nhapcauhoi&made=<?php echo $_GET['made']; ?>" class="btn col-md-3 btn-primary mt-2 mb-2">Thêm câu hỏi</a></div>
            </div>    
        </div>
    </div> 
</section>