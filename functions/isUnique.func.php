<?php
// isUnique.func.php ;
/* cette fonction va nous aider a tester si une entré existe deja dans la base de données*/

function isUnique($sql,$values){
      $stmt = runQuery($sql,$values);
      return $stmt->rowCount() == 0 ;
}
?>