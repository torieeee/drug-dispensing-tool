<?php

include_once("connectorclass.php");

//class has the sql definer for deletions
class deletion{

    public $sqlstmt;

  function __construct($tablename, $fieldname ,$target){

   $this ->sqlstmt = "DELETE from `$tablename` where $fieldname='$target'";

  }



  
}


?>