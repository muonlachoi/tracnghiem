<?php 
  class giaovien{
    var $magv=0;
    var $tengv=null;
    var $user=null;
    var $pass=null;
    var $role=0;
    public function __construct(){}
    // function insertGiaoVien($magv,$tengv,$user,$pass,$role){
    //   $query="insert into giaovien(maGV,tenGV,user,pass,role) values(:maGV,:tenGV,:user,:pass,:role)";
    //   $db=new connect();
    //   $stm=$db->execP($query);
    //   $stm->bindParam(':maGV',$magv);
    //   $stm->bindParam(':tenGV',$tengv);
    //   $stm->bindParam(':user',$user);
    //   $stm->bindParam(':pass',$pass);
    //   $stm->bindParam(':role',$role);
    //   $stm->execute();
    // }
    function kiemtraGiaoVien($magv,$user)
    {
      $select="select * from giaovien where maGV=$magv and user='$user'";
      $db=new connect();
      $result=$db->getList($select);
      $set=$result->fetch();
      return $set;
    }
    public function login_gv($magv, $pass)
    {
      $select = "select * from giaovien WHERE maGV='$magv' and pass='$pass'";
      $db = new connect();
      $result = $db->getList($select);
      $set = $result->fetch();
      return $set;
    }
    public function insertTimer($date,$hour,$min,$sec,$made)
    {
      $query="insert into timer(id,date,hour,minutes,seconds,maDe)values(null,'$date',$hour,$min,$sec,$made)";
      $db=new connect();
      $result=$db->exec($query);
      
    }
    public function getTimer($made)
    {
      $select="select * from timer where maDe=$made";
      $db=new connect();
      $result=$db->getList($select);
      return $result;
    }
    public function updateTimer($id,$date,$hour,$min,$sec,$made){
      $query="update timer set date='$date',hour=$hour,minutes=$min,seconds=$sec where id=$id and maDe=$made";
      $db=new connect();
      $result=$db->exec($query);
    }
    public function kiemtraTimer($made)
    {
      $select="select * from timer where maDe=$made";
      $db=new connect();
      $result=$db->selectone($select);
      return $result;
    }
    function listSinhVien($magv)
    {
      $select = "select a.maHS,a.tenHS,a.diachi,a.email,d.tenlop from hocsinh a, giaovien b , ketqua c,lop d 
      WHERE a.maHS=c.maHS and b.maGV=c.maGV and d.maLop=a.maLop and b.maGV=$magv";
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
    
    function updateSV($mahs,$tenhs,$diachi,$email)
    {
        $query="update hocsinh set tenHS = '$tenhs',diachi='$diachi',email=$email where maHS=$mahs";
       
        $db = new connect();
        $result = $db->exec($query);
    }
    public function listLop($magv)
    {
      $select = "select DISTINCT c.tenlop from de a , giaovien b,lop c WHERE a.maGV = b.maGV and a.maLop=c.maLop and b.maGV=$magv ";
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
   
    function listSinhViens($magv,$malop,$mamon){
      $select = "select distinct a.maHS,a.tenHS,a.diachi,a.email,d.tenlop,e.maMon,d.maLop from hocsinh a, giaovien b , phancong c,lop d,mon e where a.maLop=c.maLop and b.maGV=c.maGV and d.maLop=a.maLop and c.maMon= e.maMon and b.maGV=:maGV and d.maLop=:maLop and c.maMon =:maMon";
      $db = new connect();
      $stm = $db->execP($select);
      $stm->bindValue(':maGV',$magv);
      $stm->bindValue(':maLop',$malop);
      $stm->bindValue(':maMon',$mamon);
      $stm->execute();
      return $stm;
      }
    function nhapMon($magv)
      {
        $select  ="select distinct a.maMon,b.tenMon from phancong a, mon b where a.maMon=b.maMon and a.maGV='$magv'";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
      }
      function nhapLop($magv)
      {
       $select  ="select distinct a.maLop,b.tenLop from phancong a, lop b where a.maLop=b.maLop and a.maGV='$magv'";
       $db = new connect();
       $result = $db->getList($select);
       return $result;
      }
      function dsLop($magv,$mamon){
        $select="select distinct c.tenLop,b.maLop from phancong b,lop c where b.maLop=c.maLop and b.maGV='$magv' and b.maMon='$mamon'";
        $db=new connect();
        $result=$db->getList($select);
        return $result;
      }
      function dsMon($magv){
        $select="select distinct b.maMon,c.tenMon from phancong b,mon c where  b.maMon=c.maMon and  b.maGV='$magv'";
        $db=new connect();
        $result=$db->getList($select);
        return $result;
      }
      public function listDiemHs($magv,$mamon,$malop){
        $select = "select a.maHS,a.maDe,b.tenHS,c.tenMon,a.socaudung,a.diem,d.soluongcauhoi from ketqua a, hocsinh b, mon c,de d where a.maHS=b.maHS and a.maMon=c.maMon and a.maDe and a.maDe=d.maDe and a.maGV='$magv' and c.maMon='$mamon' and b.maLop=$malop";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    function tenLop($malop){
        $select="select * from lop where maLop='$malop'";
        $db = new connect();
        $result = $db->selectone($select);
        return $result;
    }
  }
?>