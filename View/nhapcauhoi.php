<section  >
    
    <div class="container" >
        <form action="index.php?action=nhapde&act=nhapvaocauhoi&made=<?php echo $_GET['made'] ?>" method="post" name='nhapcauhoi' class=" form mb-3" ">
            <table align='center' class="text-center mt-md-4 table-borderless">
            <input class="form-control" type="hidden" name="maND" size="45px">
                <tr class="text-md-center ">
                    <th colspan=2>
                        <h2>NHẬP CÂU HỎI</h2>
                    </th>
                </tr>
                <input class=" form-control" type="hidden" name="maDe" value="<?php echo $_GET['made']; ?>" size="45px">
                <tr>
                    <td><b>NỘI DUNG:</b></td>
                    <td>
                        <textarea class="form-control"  id="editor" placeholder="Nội dung câu hỏi"  name="cauhoi" cols="45" rows="3"></textarea>
                        
                    </td>
                    <td>
                        <span class="error text-start"><?php if(isset($NDErr)) echo $NDErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU A:</b></td>
                    <td>
                        <input class="form-control" placeholder="Câu A" type="text" name="dapanA" size="45px">
                        
                    </td>
                    <td>
                        <span class="error text-start"><?php if(isset($aErr)) echo $aErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU B:</b></td>
                    <td><input class="form-control" placeholder="Câu B" type="text" name="dapanB" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($bErr)) echo $bErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU C:</b></td>
                    <td><input class="form-control" placeholder="Câu C" type="text" name="dapanC" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($cErr)) echo $cErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU D:</b></td>
                    <td><input class="form-control" placeholder="Câu D" type="text" name="dapanD" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($dErr)) echo $dErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>ĐÁP ÁN:</b></td>
                    <td><input class="form-control" placeholder="Đáp án" type="text" name="ketqua" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($KQErr)) echo $KQErr; ?></span>
                    </td>
                </tr>
                <tr class="text-md-center">
                    <td colspan=2>
                        <input type="submit" name="submit" class="btn btn-primary mt-md-2" name="nhapcauhoi" value="Thêm Câu Hỏi">
                        <a href="index.php?action=dethi&act=dethi&made=<?php echo $_GET['made'] ?>" class="btn btn-primary mt-md-2">Xem câu hỏi đã nhập</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<script>
    var noidung=document.getElementsByTagName('cauhoi')
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        noidung=editor;
    } )
    .catch( error => {
        console.error( error );
    } );
</script>