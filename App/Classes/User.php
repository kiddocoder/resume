<?php
namespace App\classes;

include("../../functions/query.func.php");
use App\classes\DB;
use App\classes\Cookie;
use App\classes\Session;

class User {

      private $db,$conn,$sessions,$cookies;
      public function __construct() {
           $this->db = new DB();
           $this->sessions = new Session();
           $this->cookies = new Cookie();

           $this->conn = $this->db->Connexion();
      }

      /**
       * @param $email user email
       * @param $password user password
       * @return array
       */
      function checkUser($email,$password){

            if (empty($email) && empty($password)) {
                  $data['errorlogin']['message'] = 'Adresse email ou mot de passe invalide.';
                  exit;
              }

              $email = htmlspecialchars($_POST['email']);
              $password = htmlspecialchars($_POST['mdp']);

              $emailCheck = "SELECT * FROM utilisateurs WHERE email = ?";
              $result = runQuery($emailCheck, $email);

              if ($result->rowCount() > 0) {
                  $user = $result->fetch();
                  if (password_verify($password, $user['mot_de_passe'])) {
                      $data['loginsuccess']['message'] = 'Login successful!';

                      // start session
                      $this->sessions->startSession();

                      // set session variables
                      $this->sessions->setSession('uid', $user['uid']);
                      $this->sessions->setSession('email', $user['email']);
                      $this->sessions->setSession('photo', $user['photo']);

                      // set cookie for one year
                      $this->cookies->setCookie('uid', $user['uid'], 3600*24*60);
                      $this->cookies->setCookie('email', $user['email'], 3600*24*60);
                      $this->cookies->setCookie('photo', $user['profile'], 3600*24*60);

                  } else {
                      $data['errorlogin']['message'] = 'Mot de passe incorrect.';
                  }
              } else {
                  $data['errorlogin']['message'] = 'Aucun compte avec cette adresse email.';
              }
      }

      function insertUser($data){

      }

      function deleteUser($id){

      }

      function logout(){

      }


}