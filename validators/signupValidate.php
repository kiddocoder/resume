<?php
// validators\checkLogin.php ;

/* Ce fichier va s'occuper de la validation des authentifications d'un utilisateur*/

// error_reporting(0);// cacher tous les erreurs non neccessaire
include("../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("content-type: application/json; charset=utf-8");
include("../root.php");
include(Root_path."functions/query.func.php");
include(Root_path."functions/isUnique.func.php");

use App\classes\DB;


$data = [];
$db = new DB();
$conn = $db->Connexion();// connect to the Database

if (!isset($_POST['nom'],$_POST['prenom'],$_POST['prenom'],$_POST['mdp'])) {
      $data['error']['both'] = 'Veuillez renseigner tous les champs.';
      echo json_encode($data);
      exit;
}

$nom = isset($_POST['nom']) ?? '';
$prenom = isset($_POST['prenom']) ?? '';
$mdp = isset($_POST['mdp']) ?? '';

$checkEmail = "SELECT * FROM utilisateurs WHERE email = ?";
if(!isUnique($checkEmail, $email)){
      $data['error']['email'] = "Désolé cette email est déjà prise, Essayer une autre !";
}
echo json_encode($data);
?>