<?php
    function get_user(){
        global $db;
        $req = $db->query("
            SELECT  *
            FROM utilisateurs 
            WHERE email ='{$_SESSION['user']}'
        ");

        $result = $req->fetchObject();
        return $result;
    }