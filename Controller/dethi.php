<?php
  $action="dethi";
  if(isset($_GET['act'])){
      $action=$_GET['act'];
  }
  switch($action){
    case "dethi":
        include "View/dethi.php";
        break;
    case "insert_CH":
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            // nhưng cái gì đẩy lên server lưu tạm trong tmp_name
            // mà truy vấn tmp_name phải có key là name trong HTML
            $file=$_FILES["file"]["tmp_name"];
            // remove UTF-8 bị mã hóa
            file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
            // Mở file
            $file_open=fopen($file,"r");
            // đọc từng dòng
            while(($csv=fgetcsv($file_open,2000,";"))!=false)
            {
                $cauhoi=$csv[0];
                $dapanA=$csv[1];
                $dapanB=$csv[2];
                $dapanC=$csv[3];
                $dapanD=$csv[4];
                $ketqua=$csv[5];
                $maDe=$csv[6];
                $db = new cauhoi();
                $db->insertCauhoi($cauhoi,$dapanA,$dapanB,$dapanC,$dapanD,$ketqua,$maDe);
            }
        }
        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=dethi&act=dethi&made='.$maDe.'"/>';
        echo '<script> alert("Upload danh sách câu hỏi thành công")</script>';
        break;
    case "edit":
        include "View/updatecauhoi.php";
        break;
    case "update":
        $made=$_POST['maDe'];
        $maND = $_POST['maND'];
        $cauhoi = trim($_POST['cauhoi']);
        $dapanA = trim($_POST['dapanA']);
        $dapanB = trim($_POST['dapanB']);
        $dapanC = trim($_POST['dapanC']);
        $dapanD = trim($_POST['dapanD']);
        $ketqua = trim($_POST['ketqua']);
        $noidungs=$caua=$caub=$cauc=$caud=$ketquas="";
            $NDErr=$aErr=$bErr=$cErr=$dErr=$KQErr="";
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);//thay \ thành ''
                //   $data=htmlspecialchars($data);
                return $data;
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(empty($cauhoi)){
                    $NDErr="<h6 class='ms-3'>* Nội dung câu hỏi không được rỗng</h6>";
                }
                else{
                    $noidungs=test_input($cauhoi);
                }
                if(empty($dapanA)){
                    $aErr="<h6 class='ms-3'>* Câu A không được rỗng</h6>";
                }
                else{
                    $caua=test_input($dapanA);
                }
                if(empty($dapanB)){
                    $bErr="<h6 class='ms-3'>* Câu B không được rỗng</h6>";
                }
                else{
                    $caub=test_input($dapanB);
                }
                if(empty($dapanC)){
                    $cErr="<h6 class='ms-3'>* Câu C không được rỗng</h6>";
                }
                else{
                    $cauc=test_input($dapanC);
                }
                if(empty($dapanD)){
                    $dErr="<h6 class='ms-3'>* Câu D không được rỗng</h6>";
                }
                else{
                    $caud=test_input($dapanD);
                }
                if(empty($ketqua)){
                    $KQErr="<h6 class='ms-3'>* Kết quả không được rỗng</h6>";
                }
                else{
                    $ketquas=test_input($ketqua);
                }
                if(!$NDErr && !$aErr && !$bErr && !$cErr && !$dErr&& !$KQErr)
                {
                    $db= new cauhoi();
                    $db->updateCauhoi($maND,$noidungs,$caua,$caub,$cauc,$caud,$ketquas,$made);
                    echo '<script> alert ("Cập nhật câu hỏi thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=dethi&act=dethi&made='.$made.'"/>';
                }

            }
        include "View/updatecauhoi.php";
        break;
    case "delete_cauhoi":
        if (isset($_GET['mand'])) {
            $maND = $_GET['mand'];
            $maDe = $_GET['made'];
            $db= new cauhoi();
            $db -> deleteCauhoi($maDe,$maND);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=dethi&act=dethi&made='.$maDe.'"/>';
        }
        break;
    case "delete_de":
        if (isset($_GET['made'])) {
            $maDe = $_GET['made'];
            $db= new de();
            $db -> deleteDe($maDe);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=giaovien&act=giaovien"/>';
        }
        break;
}
?>