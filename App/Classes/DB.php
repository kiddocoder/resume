<?php
namespace App\classes;

class DB{
      private $host = 'localhost';
      private $user = 'root';
      private $password = '';
      private $database = 'cv_db';
      private $conn;

      public function __construct(){
            $this->Connexion();
      }

      function Connexion(){
            try{
                  $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
                  return $this->conn;
            }catch(\Exception $e){
                  return ['error' => $e->getMessage()];
            }
      }

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

      function isUnique($sql,$values){
            $stmt = $this->runQuery($sql,$values);
            return $stmt->rowCount() == 0 ;
      }
}
?>