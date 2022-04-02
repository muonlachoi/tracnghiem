<?php
  $action="baithi";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action)
  {
    case "baithi":
        include "View/baithi.php";
        break;
    case "diemthi":
        include "View/diemhocsinh.php";
        break;
    case "nopbai":
                if(!empty($_POST['chon']) ){
                    //số câu chọn
                    // $count=count($_POST['chon']);
                    // echo " out of 5,you have selected ".$count." options";
                
                    $_SESSION['checkeds']=$_POST['chon'];
                    // $selected=$_POST['chon'];
                    $mahs=$_SESSION['maHS'];
                    // print_r($selected);
                    if(isset($_GET['maDe']))
                    {
                        $made=$_GET['maDe'];
                        $db=new cauhoi();
                        $re=$db->listQuizs($made);
                        $diem=0;
                        $socaudung=0;
                        //hiện tại set đang không hoạt động
                        while($set=$re->fetch()){
                            $magv=$set['maGV'];
                            $mamon=$set['maMon'];
                            $made=$set['maDe'];
                            $socauhoi=$set['soluongcauhoi'];
                            $diemmotcau=10/$socauhoi;
                            $checked=$set['ketqua']==$_SESSION['checkeds'][$set['maND']];
                            // $checked=$set['ketqua']==$selected[$set['maND']];
                            if($checked){

                                $diem+=$diemmotcau;
                                $socaudung++;
                            }
                        }
                        
                        
                        $kq=new ketqua();
                        $kq->insertKetQua($mahs,$mamon,$made,$magv,$socaudung,$diem);   
                        echo '<script> 
                        alert ("Nộp bài thành công - Số câu đúng: '.$socaudung.' - Điểm: '.$diem.' ")</script>';
                        $timeEnd=strtotime($_SESSION['end_time'])."<br>";
                        $rightnow=time();
                        if($rightnow<$timeEnd)
                        {
                            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=sinhvien&act=sinhvien"/>';
                            unset($_SESSION['thoigian']);
                            unset($_SESSION['start_time']);
                            unset($_SESSION['end_time']);
                        }
                        else{echo '<meta http-equiv="refresh" content="0; url=./index.php?action=baithi&act=baithi&maDe='.$_GET['maDe'].'"/>';
                            unset($_SESSION['thoigian']);
                            unset($_SESSION['start_time']);
                            unset($_SESSION['end_time']);}
                       
                        
                        // echo '<meta http-equiv="refresh" content="0; url=./index.php?action=sinhvien&act=sinhvien"/>';
                    }
                }
                else
                {
                    echo '<script> alert ("Bạn chưa chọn câu trả lời")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=baithi&act=baithi&maDe='.$_GET['maDe'].'"/>';
                }
            
            break;
            
            
            // echo "Điểm là ".$diem;
            // echo "Mã hs là ".$mahs."<br>";
            // echo "mã môn".$mamon."<br>";
            // echo "mã giáo viên ".$magv."<br>";
            // echo "Số câu đúng ".$socaudung."<br>";
            // echo "Mã đề là ".$made."<br>";
            
  }
?>