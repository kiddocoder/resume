<?php
// validators\checkLogin.php ;

/* Ce fichier va s'occuper de la validation des authentifications d'un utilisateur*/

error_reporting(0);// cacher tous les erreurs non neccessaire
include("../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("content-type: application/json; charset=utf-8");
include("../root.php");
include(Root_path."functions/query.func.php");

use App\classes\Cookie;
use App\classes\Session;

$data = [];
$Session = new Session();
$Cookie = new Cookie();

if (!isset($_POST['email'], $_POST['mdp'])) {
    $data['error']['both'] = 'Adresse email ou mot de passe invalide.';
    echo json_encode($data);
    exit;
}

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['mdp']);

$emailCheck = "SELECT * FROM utilisateurs WHERE email = ?";
$result = runQuery($emailCheck, $email);

if ($result->rowCount() > 0) {
    $user = $result->fetch();
    if (password_verify($password, $user['mot_de_passe'])) {
        $data['message'] = 'Login successful!';
        // start session
        $Session->startSession();

        // set session variables
        $Session->setSession('id', $user['id']);
        $Session->setSession('email', $user['email']);
        $Session->setSession('profile', $user['profile']);

        // set cookie
        $Cookie->setCookie('id', $user['id'], 3600*24*60);
        $Cookie->setCookie('email', $user['email'], 3600*24*60);
        $Cookie->setCookie('profile', $user['profile'], 3600*24*60);

    } else {
        $data['error']['mdp'] = 'Mot de passe incorrect.';
    }
} else {
    $data['error']['email'] = 'Aucun compte avec cette adresse email.';
}

// send data to the client in json Format
echo json_encode($data);
?>