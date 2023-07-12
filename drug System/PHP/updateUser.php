<?php

  class Update{

    public $sqlstmt = "";

    function __construct($tableName, $updateFieldName, $updateValue, $fieldName, $nameValue){

      $this -> sqlstmt = "UPDATE `$tableName` SET '$updateFieldName' = '$updateValue' Where '$fieldName'='$nameValue'";

    }
  }


?>