<?php
     class lop{
          public function __construct(){}
          public function insertLop($malop,$tenlop,$siso)
          {
              $query="insert into lop(maLop,tenLop,siso) 
              values(:maLop,:tenLop,:siso)";
              $db=new connect();
              $stm=$db->execP($query);
              $stm->bindParam(':maLop',$malop);
              $stm->bindParam(':tenLop',$tenlop);
              $stm->bindParam(':siso',$siso);
              $stm->execute();
          }
          public function xemLop()
          {
            $select="select * from lop";
            $db = new connect();
            $result = $db->getList($select);
            return $result;
          }
          public function kiemtramaLop($malop)
          {
              $db = new connect();
              $select = "select * from lop where malop='$malop'";
              $result = $db->getList($select);
              $set = $result->fetch();
              return $set;
          }
          public function kiemtraTenLop($tenlop)
          {
              $db = new connect();
              $select = "select * from lop where tenlop='$tenlop'";
              $result = $db->getList($select);
              $set = $result->fetch();
              return $set;
          }
          function deleteLop($malop)
          {
              $query="DELETE FROM lop WHERE malop='$malop'";
              $db = new connect();
              $result = $db->exec($query);
          }
          function getListLop($malop)
          {
              $select = "select * from lop where maLop=$malop";
              $db = new connect();
              $result = $db->selectone($select);
              return $result;
          }
          function updateLop($malop,$tenlop,$siso)
          {
              $query="update lop set tenLop = '$tenlop',siso=$siso where maLop=$malop";
              $db = new connect();
              $result = $db->exec($query);
          }
          function tenLop($malop){
            $select="select * from lop where maLop='$malop'";
            $db = new connect();
            $result = $db->selectone($select);
            return $result;
        }
     }
?>