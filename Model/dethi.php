<?php 
  class de{
      var $made=0;
      var $mamon=null;
      var $socauhoi=0;
      var $thoigian=0;
      var $kichhoat=0;
      var $magv=0;
      var $malop=0;
      public function __construct(){}
    // hiện đề sinh viên
      function displayDeSV($tenlop){
        $select="select a.maDe,a.maMon,a.maGV,b.tenMon,a.soluongcauhoi,a.thoigian,c.tenLop,c.siso,d.tenGV,e.date,e.hour,e.minutes,e.seconds,e.id from de a, mon b, lop c, giaovien d,timer e 
        where a.maMon=b.maMon and a.maLop=c.maLop and a.maGV=d.maGV and a.maDe=e.maDe and c.tenLop=:tenLop order by maDe DESC";
        $db=new connect();
        $stm=$db->execP($select);
        $stm->bindParam(':tenLop',$tenlop);
        $stm->execute();
        return $stm;
      }
     
      //hiện đề của giáo viên
      function displayDeGV($magv){
        $select="select a.maDe,b.tenMon,a.soluongcauhoi,a.thoigian,c.tenLop,c.siso,d.tenGV from de a, mon b, lop c, giaovien d 
        where a.maMon=b.maMon and a.maLop=c.maLop and a.maGV=d.maGV and a.maGV=:maGV";
        $db=new connect();
        $stm=$db->execP($select);
        $stm->bindParam(':maGV',$magv);
        $stm->execute();
        return $stm;
      }
      //nhập đề
      public function insertDethi($maDe, $maMon, $soluongcauhoi, $thoigian, $kichhoat, $maGV, $maLop)
    {
        $query = "insert into de(maDe,maMon,soluongcauhoi,thoigian,kichhoat,maGV,maLop) values(:maDe,:maMon,:soluongcauhoi,:thoigian,:kichhoat,:maGV,:maLop)";
        $db = new connect();
        $stm = $db->execP($query);
        $stm->bindParam(':maDe', $maDe);
        $stm->bindParam(':maMon', $maMon);
        $stm->bindParam(':soluongcauhoi', $soluongcauhoi);
        $stm->bindParam(':thoigian', $thoigian);
        $stm->bindParam(':kichhoat', $kichhoat);
        $stm->bindParam(':maGV', $maGV);
        $stm->bindParam(':maLop', $maLop);
        $stm->execute();
    }
    public function kiemtradethi($maDe)
    {
        $db = new connect();
        $select = "select * from de where maDe='$maDe'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }
    //lấy dữ liệu của đề ở trang đề thi
    function getListDe($maDe)
    {
        // mỗi id chỉ trả về đúng 1 row
        $select = "select a.maDe,b.tenMon,a.soluongcauhoi,a.thoigian,c.tenLop,d.tenGV from de a, mon b, lop c, giaovien d 
        where a.maMon=b.maMon and a.maLop=c.maLop and a.maGV=d.maGV and a.maDe=$maDe";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
    }
    // xóa đề
    function deleteDe($maDe)
    {
        $query="DELETE FROM de WHERE maDe='$maDe'";
        $db = new connect();
        $result = $db->exec($query);
    }
  }
?>