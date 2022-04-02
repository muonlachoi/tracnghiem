<?php
  class connect{
      var $db=null;
      public function __construct()
      {
        $dsn='mysql:host=localhost;dbname=tracnghiem2';
        $user='root';
        $pass='root';
        $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
      }
      //
      public function selectone($select)
      {
        $result=$this->db->query($select);
        $results=$result->fetch();
        return $results;
      }
      //
      public function getList($select)
      {
        $result=$this->db->query($select);
        return $result;
      }
      //prepare
      public function execP($query){
        $statement=$this->db->prepare($query);
        return $statement;
      }
      public function exec($query)
      {
        $results=$this->db->exec($query);
        // echo $results;
        return($results);
      }
  }
?>