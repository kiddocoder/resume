<?php
namespace App\classes;

use App\classes\DB;
use App\classes\Cookie;
use App\classes\Session;

class User {
    private $db;
    private $conn;
    private $sessions;
    private $cookies;

    public function __construct() {
        $this->db = new DB();
        $this->sessions = new Session();
        $this->cookies = new Cookie();
        $this->conn = $this->db->Connexion();
    }

    /**
     * Vérifie les informations de connexion de l'utilisateur.
     *
     * @param string $email L'email de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @return array Les résultats de la vérification
     */
    public function checkUser($email, $password) {
        $data = [];

        // Vérification des champs vides
        if (empty($email) || empty($password)) {
            $data['errorlogin']['message'] = 'Adresse email ou mot de passe invalide.';
            return $data;
        }

        // Sécurisation des entrées
        $email = htmlspecialchars(trim($email));
        $password = htmlspecialchars(trim($password));

        // Requête pour vérifier l'email
        $emailCheck = "SELECT * FROM utilisateurs WHERE email = ?";
        $result = $this->db->runQuery($emailCheck, $email);

        if ($result->rowCount() > 0) {
            $user = $result->fetch();
            // Vérification du mot de passe
            if (password_verify($password, $user['mot_de_passe'])) {
                $data['loginsuccess']['message'] = 'Connexion réussie !';
                // Démarrer la session
                $this->sessions->startSession();
                // Définir les variables de session
                $this->sessions->setSession('uid', $user['uid']);
                $this->sessions->setSession('email', $user['email']);
                $this->sessions->setSession('photo', $user['photo']);
                // Définir des cookies pour un an
                $this->cookies->setCookie('uid', $user['uid'], 3600 * 24 * 60);
                $this->cookies->setCookie('email', $user['email'], 3600 * 24 * 60);
                $this->cookies->setCookie('photo', $user['photo'], 3600 * 24 * 60);
                echo "<script>alert('Connexion réussie');window.location.href='home.php'</script>";
            } else {
                $data['errorlogin']['message'] = 'Mot de passe incorrect.';
            }
        } else {
            $data['errorlogin']['message'] = 'Aucun compte avec cette adresse email.';
        }

        return $data;
    }


    /**
     * Insère un nouvel utilisateur dans la base de données.
     *
     * @param array $data Les données de l'utilisateur
     * @return void
     */
    public function insertUser($data) {
        $nom = htmlspecialchars(trim($data['nom']));
        $prenom = htmlspecialchars(trim($data['prenom']));
        $email = htmlspecialchars(trim($data['email']));
        $adress = htmlspecialchars(trim($data['adress']));
        $mdp = htmlspecialchars(trim($data['mdp']));
        $mdp2 = htmlspecialchars(trim($data['mdp2']));
        $errors = [];

        // Vérification des champs vides
        if (empty($nom) || empty($prenom) || empty($email) || empty($adress) || empty($mdp) || empty($mdp2)) {
            $errors['errorsignup']['message'] = "Veuillez remplir tous les champs.";
        }

        // Vérification des mots de passe
        if ($mdp !== $mdp2) {
            $errors['errorsignup']['message'] = "Les mots de passe ne sont pas les mêmes.";
        }

        // Vérification de l'email déjà pris
        $sqlemail = "SELECT * FROM utilisateurs WHERE email = ?";
        if (!$this->db->isUnique($sqlemail,$email)) {
            $errors['errorsignup']['message'] = "L'email est déjà assigné à un autre utilisateur.";
        }

        // Vérification du type de fichier
        $nameFile = $_FILES['fileImg']['name'];
        $typeFile = pathinfo($nameFile, PATHINFO_EXTENSION);
        $correctTypes = ['jpg', 'jpeg', 'png']; // Types de fichiers acceptés

        if (!in_array($typeFile, $correctTypes)) {
            $errors['errorsignup']['message'] = "L'image n'est pas valable.";
        }

        // Affichage des erreurs
        if (!empty($errors)) {
            return $errors;
        }

        // Si aucune erreur, on procède à l'insertion
        if (empty($errors)) {
            $dir = 'img/' . basename($nameFile);
            $tmpFile = $_FILES['fileImg']['tmp_name'];
            move_uploaded_file($tmpFile,$dir);
            $mdp = password_hash($mdp,true);
            $userData = [$nom,$prenom,$nameFile,$email,$mdp,$adress];
           if($this->addUser($userData)){
                echo "
                <div class='card container text-white bg-success'>
                    Vous êtes bien inscrit, connectez-vous pour personnaliser votre CV !!!
                    <script type='text/javascript'> document.location = 'index.php'; </script>
                </div>
                ";
           }

        }
        $error2['errorsignup']['message'] = "Le probleme est survenu !.";
        return  $error2;
    }

    public function addUser($data){
         $query = "INSERT INTO utilisateurs(`nom`,`prenom`,`photo`,`email`,`mot_de_passe`,`adress`) VALUES (?,?,?,?,?,?)";
       return $this->db->runQuery($query,$data);
    }
    public function deleteUser($id) {
        # code here
    }

    public function logout() {
        #code here
    }
}



 /**
     * Compresse une image et la sauvegarde à l'emplacement spécifié.
     *
     * @param string $source_url L'URL source de l'image
     * @param string $destination_url L'URL de destination
     * @param int $quality La qualité de compression
     * @return string|void L'URL de destination ou rien en cas d'échec
     */
     function compressImage($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg') {
            $image = imagecreatefromjpeg($source_url);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefromjpeg($source_url);
        } else {
            echo "<script>alert('Image non valide !');</script>";
            return;
        }

        if ($image !== false) {
            imagejpeg($image, $destination_url, $quality);
            return $destination_url;
        }
    }
