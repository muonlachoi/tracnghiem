<?php 
 class ketqua{
    var $mahs=null;
    var $mamon=null;
    var $made=0;
    var $magv=0;
    var $socaudung=0;
    var $diem=0;
    public function __construct(){
        if(func_num_args()==6)    
          {
              $this->mahs=func_get_arg(0);
              $this->mamon=func_get_arg(1);
              $this->made=func_get_arg(2);
              $this->magv=func_get_arg(3);
              $this->socaudung=func_get_arg(4);
              $this->diem=func_get_arg(5);
             
          }
    }
    
    public function insertKetQua($mahs,$mamon,$made,$magv,$socaudung,$diem)
    {
        $query="insert into ketqua(maHS,maMon,maDe,maGV,socaudung,diem) 
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
    // public function ketquaDA(){
    //     $db = new connect();
    //     $select = "select * from kequa";
        
    //     $result = $db->selectone($select);
    //     $set = $result->fetch();
    //     return $set;
    // }
    public function ketquaDA($mahs){
        $select = "select a.maHS,a.maDe,b.tenGV,c.tenMon,a.socaudung,a.diem,d.soluongcauhoi from ketqua a, giaovien b, mon c,de d 
        where a.maGV=b.maGV and a.maMon=c.maMon and a.maDe and a.maDe=d.maDe and a.maHS=$mahs";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function listDiem($magv){
        $select = "select a.maHS,a.maDe,b.tenHS,c.tenMon,a.socaudung,a.diem,d.soluongcauhoi from ketqua a, hocsinh b, mon c,de d
        where a.maHS=b.maHS and a.maMon=c.maMon and a.maDe and a.maDe=d.maDe and a.maGV=$magv";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function kiemTraThi($mahs,$mamon,$made,$magv){
        $select="select * from ketqua where maHS=$mahs and maMon='$mamon' and maDe=$made and maGV=$magv";
        $db=new connect();
        $result=$db->selectone($select);
        return $result;
    }
 }
?>