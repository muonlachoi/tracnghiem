<?php 
    class sinhvien{ 
       
        public function __construct(){}

        public function insertUser($mahs,$tenhs,$diachi,$email,$user,$pass,$malop)
        {
            $query="insert into hocsinh(maHS,tenHS,diachi,email,user,pass,maLop) values(:maHS,:tenHS,:diachi,:email,:user,:pass,:maLop)";
            $db=new connect();
            $stm=$db->execP($query);
            $stm->bindParam(':maHS',$mahs);
            $stm->bindParam(':tenHS',$tenhs);
            $stm->bindParam(':diachi',$diachi);
            $stm->bindParam(':email',$email);
            $stm->bindParam(':user',$user);
            $stm->bindParam(':pass',$pass);
            $stm->bindParam(':maLop',$malop);
            $stm->execute();
        }
        public function listSinhVien()
          {
               $select = "select a.maHS,a.tenHS,a.email,a.diachi,a.user,a.pass, b.tenLop from hocsinh a,lop b where a.maLop=b.maLop";
               $db = new connect();
               $result = $db->getList($select);
               return $result;
           }
           function deleteSV($maHS)
           {
                $query="DELETE FROM `hocsinh` WHERE maHS='$maHS'";
                $db = new connect();
                $result = $db->exec($query);
           }
          function getlistSinhVien($mahs)
          {
              $select = "select * from hocsinh where maHS='$mahs'";
              $db = new connect();
              $result = $db->selectone($select);
              return $result;
          }
          function updateSV($mahs,$tenhs,$diachi,$email,$user,$pass,$lop)
            {
                $query="update hocsinh set tenHS = '$tenhs',diachi='$diachi',email='$email',user = '$user',pass='$pass',malop='$lop' where maHS=$mahs";
        
                $db = new connect();
                $result = $db->exec($query);
            }
           public function xemSV($malop){
            $select = "select * from hocsinh where maLop='$malop'";
            $db = new connect();
            $result = $db->getList($select);
            return $result;

        }
        function listSinhViens($malop){
            $select = "select * from hocsinh  where maLop=:maLop";
            $db = new connect();
            $stm = $db->execP($select);
            $stm->bindValue(':maLop',$malop);
            $stm->execute();
            return $stm;
            }
           
    }
?>