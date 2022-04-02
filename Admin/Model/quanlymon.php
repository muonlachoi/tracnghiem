<?php
     class mon{
          public function __construct(){}
          public function insertMon($mamon,$tenmon)
          {
              $query="insert into mon(maMon,tenMon) 
              values(:maMon,:tenMon)";
              $db=new connect();
              $stm=$db->execP($query);
              $stm->bindParam(':maMon',$mamon);
              $stm->bindParam(':tenMon',$tenmon);
              $stm->execute();
          }
          public function xemMon()
          {
            $select="select * from mon";
            $db = new connect();
            $result = $db->getList($select);
            return $result;
          }
          public function kiemtramaMon($mamon)
          {
              $db = new connect();
              $select = "select * from mon where maMon='$mamon'";
              $result = $db->getList($select);
              $set = $result->fetch();
              return $set;
          }
          public function kiemtraTenMon($tenmon)
          {
              $db = new connect();
              $select = "select * from mon where tenMon='$tenmon'";
              $result = $db->getList($select);
              $set = $result->fetch();
              return $set;
          }
          function deleteMon($mamon)
          {
              $query="DELETE FROM mon WHERE maMon='$mamon'";
              $db = new connect();
              $result = $db->exec($query);
          }
          function getListMon($mamon)
          {
              $select = "select * from mon where maMon='$mamon'";
              $db = new connect();
              $result = $db->selectone($select);
              return $result;
          }
          function updateMon($mamon,$tenmon)
          {
              $query="update mon set tenMon = '$tenmon' where maMon='$mamon'";
              $db = new connect();
              $result = $db->exec($query);
          }
       
          
     }
?>