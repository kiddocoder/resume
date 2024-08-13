<?php
 
// debut foncvtion de recherche
//connection a la bdd
// include 'db.php';
/* pour les recherches ajax D�claration d'une nouvelle classe */
class connexionDB {
    private $host    = 'localhost';    // nom de l'host
    private $name    = 'u654857617_gomaomarket';     // nom de la base de donn�e
    private $user    = 'root';         // utilisateur
    private $pass    = '';         // mot de passe
    //private $pass    = '';           // Ne rien mettre si on est sous windows
    private $connexion;
  
    function __construct($host = null, $name = null, $user = null, $pass = null){
        if($host != null){
            $this->host = $host;           
            $this->name = $name;           
            $this->user = $user;          
            $this->pass = $pass;
        }
    try{
        $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
            $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8', 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch (PDOException $e){
        echo 'Erreur : Impossible de se connecter  a la BDD !';
    die();
   }
  }
    public function query($sql, $data = array()){
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
  
        return $req;
    }
    public function insert($sql, $data = array()){
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
    }
  }
  
  // Faire une connexion � votre fonction
  $DB = new connexionDB();
//requette aui cherche les contenus de la bdd
    if(1==1){
        if(isset($_GET['user'])){
            $user = trim($_GET['user']);
            $req = $DB->query("SELECT * FROM posts WHERE title LIKE? 
            ",array("%$user%"));
            $req=$req->fetchAll();
            
            
            if(!empty($req)){
            echo ' <p style="color:black;"class="sidebar-title"> Resultats de votre recherche</p>';
                foreach($req as $r){  
                    ?>
                    
                        <div class="shadow">
                            <div class="card" style="display:flex;">
                                <div class="container">
                                    <div class="shadow"  >
                                        <!-- <img src="img/posts/" class="img-rounded   position-absolute top-10 end-0 " alt="user" style="width:10% ; border-radius:10%; "> -->
                                    </div>
                                </div>
                                <div>
                                    <div class="container">
                                        <p class="text text-primary">
                                            <a href="index.php?page=single&id=<?= $r['id'] ?>" style="text-decoration:none;">
                                                <?= substr(nl2br($r['title']),0,30); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br> 
                        </div>
                    
                <?php
            
            }}}
    }
       


