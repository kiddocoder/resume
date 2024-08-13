<?php
include("./root.php");
include(Root_path."vendor/autoload.php");

use App\classes\User;

// check user login informations
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user = new User();
  $errors = $user->checkUser($_POST['email'],$_POST['mdp']);
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


                  <?php if(isset($errors['errorlogin'])){?>
                    <div class="card gb-danger mb-2" id="error_login">
                      <div class="card-content gb-danger text-center p-2">
                        <h6 class="gb-danger text-danger" >
                          <?php echo($errors['errorlogin']['message']);?>
                        </h6>
                      </div>
                    </div>
                    <?php
                      }
                    ?>
                    <form  method="POST" id="login-form">
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
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">J'ai pas de compte ? <a href="signup.php"
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
    <script>
      let loginError = document.getElementById("error_login");

      if(loginError) setTimeout(() => {
        loginError.style.display = 'none';
      }, 5000);
    </script>
  </body>
</html>