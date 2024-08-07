<?php
// validators/signupValidate.php
/* Ce fichier va s'occuper de la validation des authentifications d'un utilisateur */
error_reporting(0); // cacher tous les erreurs non nécessaires
include("../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
include("../root.php");
include(Root_path . "functions/query.func.php");
include(Root_path . "functions/isUnique.func.php");
use App\classes\DB;

$data = [];
$db = new DB();
$conn = $db->Connexion(); // connect to the Database

// Vérification des champs requis
if (!isset($_POST['nom'], $_POST['prenom'], $_POST['email'],$_POST['adress'], $_POST['mdp'], $_POST['intro'])) {
    $data['error']['both'] = 'Veuillez renseigner tous les champs.';
    echo json_encode($data);
    exit;
}

$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$adress = trim($_POST['adress']);
$mdp = $_POST['mdp'];
$intro = trim($_POST['intro']);

// Validation de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $data['error']['email'] = "Veuillez entrer une adresse email valide.";
    echo json_encode($data);
    exit;
}

// Vérification de l'unicité de l'email
$checkEmail = "SELECT * FROM utilisateurs WHERE email = ?";
if (!isUnique($checkEmail, $email)) {
    $data['error']['email'] = "Désolé, cet email est déjà pris. Essayez une autre adresse !";
    echo json_encode($data);
    exit;
}

// Validation du fichier de l'image
$file = $_FILES['profile'];
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxFileSize = 2 * 1024 * 1024; // 2 Mo

if (!in_array($file['type'], $allowedTypes)) {
    $data['error']['file'] = "Type de fichier non autorisé. Veuillez télécharger une image.";
    echo json_encode($data);
    exit;
}

if ($file['size'] > $maxFileSize) {
    $data['error']['file'] = "Le fichier est trop volumineux. La taille maximale autorisée est de 2 Mo.";
    echo json_encode($data);
    exit;
}

// Générer un nom de fichier unique
$uniqueFileName = uniqid('profile_', true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
$uploadDir = base_url.'uploads/images/';
$uploadFilePath = $uploadDir . $uniqueFileName;

// Déplacer le fichier téléchargé
if (!move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
    $data['error']['file'] = "Erreur lors du téléchargement de l'image. Veuillez réessayer.";
    echo json_encode($data);
    exit;
}

// Hachage du mot de passe
$hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

// Préparation de la requête d'insertion
$insertQuery = "INSERT INTO utilisateurs (nom, prenom, photo, email, adress, mot_de_passe, intro) VALUES (:nom,:prenom,:photo,:email,:adress,:mdp,:intro)";

$values = [
      'nom' => $nom,
      'prenom'=> $prenom,
      'photo' => $photo,
      'email' =>$email,
      'adress' =>$adress,
      'mdp' =>$hashedPassword,
      'intro' => $intro
];
$stmt = runQuery($insertQuery,$values);

// Exécution de la requête
if ($stmt) {
    $data['success'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
} else {
    $data['error']['db'] = "Erreur lors de l'inscription. Veuillez réessayer plus tard.";
}

// Retourner la réponse JSON
echo json_encode($data);
?>