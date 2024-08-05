<?php
use App\Classes\DB;

function runQuery($sql,$values){
      $db = new DB();
      $conn = $db->Connexion();

      $stmt = $conn->prepare($sql);
      if(is_string($values)){
        $values = [$values];
      }
      $stmt->execute($values);
      return $stmt;
}
?>