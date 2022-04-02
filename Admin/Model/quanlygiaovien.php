<?php 
    class giaovien{ 
       
        public function __construct(){}

        function insertGiaoVien($magv,$tengv,$user,$pass,$role){
          $query="insert into giaovien(maGV,tenGV,user,pass,role) values(:maGV,:tenGV,:user,:pass,:role)";
          $db=new connect();
          $stm=$db->execP($query);
          $stm->bindParam(':maGV',$magv);
          $stm->bindParam(':tenGV',$tengv);
          $stm->bindParam(':user',$user);
          $stm->bindParam(':pass',$pass);
          $stm->bindParam(':role',$role);
          $stm->execute();
        }
        public function listGiaoVien()
          {
               $select = "select * from giaovien";
               $db = new connect();
               $result = $db->getList($select);
               return $result;
           }
        function deleteGV($magv)
          {
               $query="DELETE FROM `giaovien` WHERE maGV='$magv'";
               $db = new connect();
               $result = $db->exec($query);
          }
          function getListGiaoVien($magv)
          {
              $select = "select * from giaovien where maGV='$magv'";
              $db = new connect();
              $result = $db->selectone($select);
              return $result;
          }
          public function getListGV()
          {
            $select="select distinct role from giaovien ";
            $db = new connect();
            $result = $db->getList($select);
            return $result;
          }
          function updateGV($magv,$tengv,$user,$pass,$role)
          {
              $query="update giaovien set tenGV = '$tengv' ,user = '$user',pass='$pass',role='$role' where maGV=$magv";
              $db = new connect();
              $result = $db->exec($query);
          }
          public function xemGV()
          {
            $select="select * from giaovien";
            $db = new connect();
            $result = $db->getList($select);
            return $result;
          }
    }
?>