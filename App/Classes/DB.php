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
}
?>