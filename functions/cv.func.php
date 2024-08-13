
<?php
/**
  * @return object
*/
function getUser(){
    global $db;
    $req = $db->query("
        SELECT  *
        FROM utilisateurs
        WHERE email ='{$_SESSION['user']}'
    ");

    $result = $req->fetchObject();
    return $result;
}
?>