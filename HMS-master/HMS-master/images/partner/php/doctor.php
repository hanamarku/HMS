<?php

//use to fetch doctor data

use LDAP\Result;

class doctor{
    public $db=null;

    public function __construct(dbController $db)
    {
       if(!isset($db->con)) return null;
       $this->db =$db;
    }

    //fetch data
     public function getData( $table = 'tabela_doktor')
    {
      $result=  $this->db->con->query("SELECT EMËR_D,MBIEMËR_D,EMAIL_D,MOSHA_D,SPECIALIZIMI,DEP_ID FROM ($table)");
      $resultArray=array();
      while($item=mysqli_fetch_array($result,MYSQLI_ASSOC)){
          $resultArray[]=$item;
      }
      return $resultArray;
    }
}
?>