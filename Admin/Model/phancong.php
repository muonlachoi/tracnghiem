<?php 
    class phancong{ 
       
        public function __construct(){}
        public function insertHocKy($id_hocky,$hocky)
        {
            $query="insert into hocky(id_hocky,hocky) 
            values(:id_hocky,:hocky)";
            $db=new connect();
            $stm=$db->execP($query);
            $stm->bindParam(':id_hocky',$id_hocky);
            $stm->bindParam(':hocky',$hocky);
            $stm->execute();
        }
        public function insertNamHoc($id_namhoc,$namhoc)
        {
            $query="insert into namhoc(id_namhoc,namhoc) 
            values(:id_namhoc,:namhoc)";
            $db=new connect();
            $stm=$db->execP($query);
            $stm->bindParam(':id_namhoc',$id_namhoc);
            $stm->bindParam(':namhoc',$namhoc);
            $stm->execute();
        }
        public function insertPC($magv,$mamon,$malop,$id_hocky,$id_namhoc)
        {
            $query="insert into phancong(maGV,maMon,maLop,id_hocky,id_namhoc) values(:maGV,:maMon,:maLop,:id_hocky,:id_namhoc)";
            $db=new connect();
            $stm=$db->execP($query);
            $stm->bindParam(':maGV',$magv);
            $stm->bindParam(':maMon',$mamon);
            $stm->bindParam(':maLop',$malop);
            $stm->bindParam(':id_hocky',$id_hocky);
            $stm->bindParam(':id_namhoc',$id_namhoc);
            $stm->execute();
        }
        public function insertPhanCong($magv,$mamon,$malop,$id_hocky,$id_namhoc)
        {
            $query="insert into phancong(maGV,maMon,maLop,id_hocky,id_namhoc) values(:maGV,:maMon,:maLop,:id_hocky,:id_namhoc)";
            $db=new connect();
            $stm=$db->execP($query);
            $stm->bindParam(':maGV',$magv);
            $stm->bindParam(':maMon',$mamon);
            $stm->bindParam(':maLop',$malop);
            $stm->bindParam(':id_hocky',$id_hocky);
            $stm->bindParam(':id_namhoc',$id_namhoc);
            $stm->execute();
        }
        public function namhoc(){
            $select="select * from namhoc";
            //   $select="select distinct a.id_namhoc,a.namhoc,b.id_hocky from namhoc a,phancong b where a.id_namhoc=b.id_namhoc";
              $db = new connect();
              $result = $db->getList($select);
              return $result;
            
        }
        function danhsachday($id_hocky,$id_namhoc){
           $select ="select a.maGV,b.tenGV,a.maMon,a.maLop, a.id_hocky, a.id_namhoc,c.tenLop,a.id_pc from phancong a,giaovien b,lop c where  a.maGV=b.maGV and a.maLop=c.maLop and a.id_namhoc='$id_namhoc' and a.id_hocky='$id_hocky'";
           $db = new connect();
           $result = $db->getList($select);
           return $result;
       }
       function danhsachday1($id_hocky,$id_namhoc){
        $select ="select a.tenGV,c.tenLop from phancong b,giaovien a,lop c where a.maGV=b.maGV and b.maLop=c.maLop and id_namhoc='$id_namhoc' and id_hocky='$id_hocky'";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
       public function hocky($idnh)
       {
        $select ="select distinct a.id_hocky,a.hocky,b.id_namhoc from hocky a, phancong b where a.id_hocky=b.id_hocky and b.id_namhoc=$idnh";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
       }
       public function kiemtramaHK($id_hocky)
       {
           $db = new connect();
           $select = "select * from hocky where id_hocky='$id_hocky'";
           $result = $db->getList($select);
           $set = $result->fetch();
           return $set;
       }
       public function kiemtraHK($hocky)
       {
           $db = new connect(); 
           $select = "select * from hocky where hocky='$hocky'";
           $result = $db->getList($select);
           $set = $result->fetch();
           return $set;
       }
       public function kiemtramaNH($id_namhoc)
       {
           $db = new connect();
           $select = "select * from namhoc where id_namhoc='$id_namhoc'";
           $result = $db->getList($select);
           $set = $result->fetch();
           return $set;
       }
       public function kiemtraNH($namhoc)
       {
           $db = new connect(); 
           $select = "select * from namhoc where namhoc='$namhoc'";
           $result = $db->getList($select);
           $set = $result->fetch();
           return $set;
       }
       function getlistNH($id_namhoc)
       {
           $select = "select * from namhoc where id_namhoc='$id_namhoc'";
           $db = new connect();
           $result = $db->selectone($select);
           return $result;
       }
       function updatenamhoc($id_namhoc,$namhoc)
       {
           $query="update namhoc set namhoc='$namhoc' where id_namhoc='$id_namhoc'";
           $db = new connect();
           $result = $db->exec($query);
       }
       function deleteNH($id_namhoc,$namhoc)
       {
           $query="DELETE FROM namhoc WHERE id_namhoc='$id_namhoc'";
           $db = new connect();
           $result = $db->exec($query);
       }
       function getlistHK($id_hocky)
       {
           $select = "select * from hocky where id_hocky='$id_hocky'";
           $db = new connect();
           $result = $db->selectone($select);
           return $result;
       }
       function updatehocky($id_hocky,$hocky)
       {
           $query="update hocky set hocky='$hocky' where id_hocky='$id_hocky'";
           $db = new connect();
           $result = $db->exec($query);
       }
       function deleteHK($id_hocky,$id_namhoc)
       {
           $query="DELETE FROM phancong WHERE id_hocky='$id_hocky' and id_namhoc='$id_namhoc'";
           $db = new connect();
           $result = $db->exec($query);
       }
       function updatephancong($magv,$mamon,$malop,$id_hocky,$id_namhoc,$id_pc)
       {
           $query="update phancong set maGV='$magv',maMon='$mamon',maLop='$malop' WHERE id_pc='$id_pc' and id_namhoc='$id_namhoc' and id_hocky='$id_hocky'";
           $db = new connect();
           $result = $db->exec($query);
       }
       function deletePC($id_pc,$id_namhoc,$id_hocky)
       {
           $query="DELETE FROM phancong WHERE id_pc='$id_pc' and id_namhoc='$id_namhoc' and id_hocky='$id_hocky'";
           $db = new connect();
           $result = $db->exec($query);
       }
       function listPC($id_namhoc,$id_hocky,$id_pc)
       {
        $select = "select a.maGV,e.tenGV,a.maMon,d.tenLop,c.hocky,b.namhoc from lop d,phancong a ,giaovien e, namhoc b, hocky c where 
        a.maGV=e.maGV and
        a.id_namhoc=b.id_namhoc and  a.maLop=d.maLop and c.id_hocky=a.id_hocky and a.id_hocky='$id_hocky' and a.id_pc='$id_pc' and a.id_namhoc='$id_namhoc'";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
       }
       function listPC1($id_namhoc,$id_hocky)
       {
        $select = "select a.maGV,a.maMon,d.tenLop,c.hocky,b.namhoc from lop d,phancong a , namhoc b, hocky c where 
        a.id_namhoc=b.id_namhoc and  a.maLop=d.maLop and c.id_hocky=a.id_hocky and a.id_hocky='$id_hocky' and a.id_namhoc='$id_namhoc'";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
       }
       function listMon($id_namhoc,$id_hocky)
       {
        $select = "select a.maGV,a.maMon,d.tenLop,c.hocky,b.namhoc from lop d,phancong a , namhoc b, hocky c where 
        a.id_namhoc=b.id_namhoc and  a.maLop=d.maLop and c.id_hocky=a.id_hocky and a.id_hocky='$id_hocky'  and a.id_namhoc='$id_namhoc'";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
       }
       function ten($id_hocky,$id_namhoc){
        $select="select a.hocky,b.namhoc from phancong c, hocky a, namhoc b where c.id_hocky=a.id_hocky and c.id_namhoc=c.id_namhoc and c.id_hocky='$id_hocky'  and c.id_namhoc='$id_namhoc' ";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
    }
    public function xemHK()
    {
      $select="select * from hocky";
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
    public function xemNH()
    {
      $select="select * from namhoc";
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
    public function tenGV($magv){
        $select="select a.tenGV from phancong where maGV='$magv'";
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
    
    public function ktphancong($mamon,$malop,$mahk,$manh)
        {
        $select="select a.maMon,a.maLop from phancong a, mon b where a.maMon=b.maMon and a.maMon='$mamon' and a.maLop=$malop and a.id_hocky=$mahk and a.id_namhoc=$manh";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
        }
    }
?>