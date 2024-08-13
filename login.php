<?php

  if(isset($_SESSION['user'])){
    echo "<script type='text/javascript'> document.location = 'index.php?page=dashboard'; </script>";
  }

  function utilisateur($email,$password)
  {

  }
  if(isset($_SESSION['user'])){
    echo "<script type='text/javascript'> document.location = 'index.php?page=cv'; </script>";
  }

  if(isset($_POST['connexion'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['mdp']));

    $errors = [];

    if(empty($email) &&  empty($password)){
        $errors['empty'] = "Entre votre Mot de passe ou l'email !";
    }else if(utilisateur($email,$password) == 0 ){
        $errors['exist']  = "Ce compte n'existe pas ou vous avez oublier un champ à completer";
    }

    if(!empty($errors)){
        ?>
          <div class="card gb-danger">
            <div class="card-content gb-danger">
              <h6 class="gb-danger text-danger" >
                <?php
                    foreach($errors as $error){
                        echo $error."<br/>";
                    }
                ?>
              </h6>
            </div>
          </div>
        <?php
    }
    else{
      $_SESSION['user'] = $email;
      // echo "<script type='text/javascript'> document.location = 'index.php?page=cv'; </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

      <!-- Link toastify css cdn -->
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
      <title>CV en ligne Personalisé | Page Login</title>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5  d-none d-md-block">
               <img class="img-fluid flex fill" style="border-radius: 1rem 0 0 1rem;" src="public/images/cv-write.jpeg" alt="cv">
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form  method="POST">

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez-vous à votre compte </h5>
                  <div  class="form-outline mb-4">
                    <label class="form-label" for="email">Adresse email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="janedoe@gmail.com" required/>
                    <small id="emailError" class="form-text text-muted"></small>
                  </div>

                  <div  class="form-outline mb-4">
                    <label class="form-label" for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="form-control form-control-lg" placeholder="********" required/>
                    <small id="mdpError" class="form-text text-muted"></small>
                  </div>

                  <div class="pt-1 mb-4">
                    <button name="connexion" type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">J'ai pas de compte ? <a href="index.php?page=signup"
                      style="color: #393f81;">Inscription</a>
                    </p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>