<?php 
  class cauhoi{
      var $mand=null;
      var $noidung=null;
      var $dapanA=null;
      var $dapanB=null;
      var $dapanC=null;
      var $dapanD=null;
      var $ketqua=null;
      var $diem=0;
      var $made=0;
      function __construct(){
        
      }
      //thêm câu hỏi
      public function insertCauhoi($noidung,$dapanA,$dapanB,$dapanC,$dapanD,$ketqua,$made)
      {
        $query = "insert into cauhoi(maND,noidungcauhoi,dapanA,dapanB,dapanC,dapanD,ketqua,maDe) 
                            values(null,:noidungcauhoi,:dapanA,:dapanB,:dapanC,:dapanD,:ketqua,:maDe)";
        $db = new connect();
        $stm = $db->execP($query);
        $stm->bindParam(':noidungcauhoi', $noidung);
        $stm->bindParam(':dapanA', $dapanA);
        $stm->bindParam(':dapanB', $dapanB);
        $stm->bindParam(':dapanC', $dapanC);
        $stm->bindParam(':dapanD', $dapanD);
        $stm->bindParam(':ketqua', $ketqua);
        $stm->bindParam(':maDe', $made);
        $stm->execute();
      }
      //dữ liệu cho phần câu hỏi
      public function Question($made){
          $db=new connect();
          $select="select a.maND,a.noidungcauhoi,a.dapanA,a.dapanB,a.dapanC,a.dapanD,a.ketqua,c.tenMon,
          b.soluongcauhoi,b.thoigian from cauhoi a, de b, mon c where a.maDe=b.maDe and b.maMon=c.maMon";
        //   $select="select * from cauhoi where maDe=:maDe";
        //   $stm=$db->execP($select);
        //   $stm->bindParam(':maDe',$made);
        //   $stm->execute();
        //   return $stm;
          $result=$db->selectone($select);
          return $result;
      }
      function listQuestions($made)
      {
        $select="select * from cauhoi where maDe=:maDe order by rand()";
        $db= new connect();
        $stm=$db->execP($select);
        $stm->bindParam('maDe',$made);
        $stm->execute();
        return $stm;
      }
      //lấy dữ liệu để tính điểm 
      function listQuizs($made)
      {
        $select="select a.maND,a.ketqua,a.maDe,b.maMon,b.soluongcauhoi,b.maGV 
        from cauhoi a inner join de b on a.maDe=b.maDe where a.maDe=:maDe ";
        $db= new connect();
        $stm=$db->execP($select);
        $stm->bindParam('maDe',$made);
        $stm->execute();
        return $stm;
      }
      
      // kiểm tra câu hỏi tồn tại hay chưa
      public function kiemCauhoi($noidung,$made)
      {
          $db = new connect();
          $select = "select noidungcauhoi from cauhoi where noidungcauhoi='$noidung' and maDe=$made";
          $result = $db->getList($select);
          $set = $result->fetch();
          return $set;
      }
      //kiểm tra mã đề có tồn tại hay không
    public function kiemMade($made)
    {
        $db = new connect();
        $select = "select maDe from de where maDe='$made'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }
    public function insertKetQua($mahs,$mamon,$made,$magv,$socaudung,$diem)
    {
        $ketqua="insert into ketqua(maHS,maMon,maDe,maGV,socaudung,diem) 
        values(:maHS,:maMon,:maDe,:maGV,:socaudung,:diem)";
        $db=new connect();
        $stm=$db->execP($query);
        $stm->bindParam(':maHS',$mahs);
        $stm->bindParam(':maMon',$mamon);
        $stm->bindParam(':maDe',$made);
        $stm->bindParam(':maGV',$magv);
        $stm->bindParam(':socaudung',$socaudung);
        $stm->bindParam(':diem',$diem);
        $stm->execute();
    }
    function displayCauhoi($maDe)
    {
        $select = "SELECT maND, noidungcauhoi, dapanA, dapanB, dapanC, dapanD, ketqua FROM `cauhoi` WHERE maDe=$maDe";
        $db = new connect();
        $stm = $db->execP($select);
        $stm->execute();
        return $stm;
    }
    function getListCauhoi($maND)
    {
        // mỗi id chỉ trả về đúng 1 row
        $select = "select * from cauhoi where maND=$maND";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
    }
    function updateCauhoi($maND,$cauhoi,$dapanA,$dapanB,$dapanC,$dapanD,$ketqua,$made)
    {
        $query="update cauhoi set noidungcauhoi='$cauhoi', dapanA='$dapanA',dapanB='$dapanB',dapanC='$dapanC',dapanD='$dapanD',ketqua='$ketqua' 
        WHERE maND=$maND and maDe=$made";
        $db = new connect();
        $result = $db->exec($query);
    }
    function deleteCauhoi($maDe,$maND)
    {
        $query="DELETE FROM `cauhoi` WHERE maDe='$maDe' AND maND='$maND'";
        $db = new connect();
        $result = $db->exec($query);
    }
  }
?> 