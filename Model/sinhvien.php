<?php 
    class sinhvien{
        var $mahs=null;
        var $tenhs=null;
        var $diachi=null;
        var $email=null;
        var $user=null;
        var $pass=null;
        var $malop=0;
        public function __construct(){}
        public function kiemtratk($user,$mahs)
        {
            $db=new connect();
            $select="select * from hocsinh where user='$user' and maHS='$mahs'";
            $result=$db->getList($select);
            $set=$result->fetch();
            return $set;
        }
        public function login_sv($mahs, $pass)
        {
            $select = "select a.maHS,a.tenHS,a.diachi,a.email,a.user,a.pass,b.tenLop from hocsinh a 
            INNER JOIN lop b on a.maLop=b.maLop where maHS='$mahs' and pass='$pass'";
            $db = new connect();
            $result = $db->getList($select);
            $set = $result->fetch();
            return $set;
        }
        function getEmail($email)
        {
            $select="select email, pass from hocsinh where email='$email'";
            $db = new connect();
            $result=$db->selectone($select);
            return $result;
        }
        function getPassEmail($email, $pass)
        {
            $select ="select email, pass from hocsinh where md5(email)='$email' and md5(pass)='$pass'";
            $db=new connect();
            $result= $db->selectone($select);
            return $result;
        }
        function updateEmail($emailold,$passnew)
        {
            $db=new connect();
            $query="update hocsinh set pass='$passnew' where email='$emailold'";
            $db->exec($query);
        }
    }
?>