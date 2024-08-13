<?php

    session_start();

    $dbhost = 'localhost';
    $dbname = 'cv_db';
    $dbuser = 'root';
    $dbpswd = '';

    try{
        $dbconnect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données nous sommes en maintenancce");
    }

    /**
  * @return object
*/
function getUser(){
    global $dbconnect;
    $email = $_SESSION['email'];
    $req = $dbconnect->query("SELECT  * FROM utilisateurs WHERE email = '.{$email}.'");

    $result = $req->fetchObject();
    return $result;
}
