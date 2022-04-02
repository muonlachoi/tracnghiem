<section> 
    <div>
    <?php
            if (isset($_GET['mand'])) {
                $maND = $_GET['mand'];
                $dt = new cauhoi();
                $result = $dt->getListCauhoi($maND);
                $cauhoi = $result[1];
                $dapanA = $result[2];
                $dapanB = $result[3];
                $dapanC = $result[4];
                $dapanD = $result[5];
                $ketqua = $result[6];
                $made=$result[7];
            }
        ?>
        <form action="index.php?action=dethi&act=update" method="post" name='nhapcauhoi' class="form mb-5">
            <table align='center' class="text-md-center mt-md-4">
                <tr class="text-md-center ">
                    <th colspan=2>
                        <h2 class="mb-3">Chỉnh Sửa Câu Hỏi</h2>
                    </th>
                </tr>
                <input type="hidden" name="maND" value="<?php echo $maND ?>">
                <input type="hidden" name="maDe" value="<?php echo $made ?>">
                <tr>
                    <td><b>CÂU HỎI:</b></td>
                    <td><textarea class="form-control" name="cauhoi" id="editor" cols="45" rows="3" value=""><?php echo $cauhoi ?></textarea></td>
                    <td>
                        <span class="error text-start"><?php if(isset($NDErr)) echo $NDErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU A:</b></td>
                    <td><input class="form-control" type="text" name="dapanA" value="<?php echo $dapanA ?>" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($aErr)) echo $aErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU B:</b></td>
                    <td><input class="form-control" type="text" name="dapanB" value="<?php echo $dapanB ?>" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($bErr)) echo $bErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU C:</b></td>
                    <td><input class="form-control" type="text" name="dapanC" value="<?php echo $dapanC ?>" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($cErr)) echo $cErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>CÂU D:</b></td>
                    <td><input class="form-control" type="text" name="dapanD" value="<?php echo $dapanD ?>" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($dErr)) echo $dErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><b>ĐÁP ÁN:</b></td>
                    <td><input class="form-control" type="text" name="ketqua" value="<?php echo $ketqua ?>" size="45px"></td>
                    <td>
                        <span class="error text-start"><?php if(isset($KQErr)) echo $KQErr; ?></span>
                    </td>
                </tr>
                <tr class="text-md-center">
                    <td colspan=2><input type="submit" name="submit" class="btn btn-primary nhapcauhoi mt-md-2" value="Lưu Câu Hỏi"></td>
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