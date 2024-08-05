<?php
include("./root.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
      <!-- Link toastify css cdn -->
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
      <title>CV en ligne Personalisé | Page Signup</title>
</head>
<body>
<section class=" class="vh-100">
  <div class="mask d-flex align-items-center container py-5 h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Creér Votre compte gratuitement</h2>

              <form action="<?=base_url?>validators/signupValidate.php" method="POST" id="signup-form">
                <div class="form-outline mb-4">
                  <label class="form-label" for="nom">Nom</label>
                  <input type="text" id="nom" name="nom" class="form-control form-control-lg" placeholder="Doe" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="prenom">Prénom</label>
                  <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" placeholder="John" />
                </div>

                <div class="form-outline mb-4">
                  <label for="profile">Photo de profile</label>
                  <input type="file" id="profile" name="profile" accept="image/*" class="form-control form-control-lg" />
                </div>

                <div  class="form-outline mb-4">
                  <label class="form-label" for="email">Votre Adresse email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="janedoe@gmail.com" />
                  <small id="emailError" class="form-text text-muted"></small>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="mdp">Mot de passe</label>
                  <input type="password" id="mdp" name="mdp" class="form-control form-control-lg"  placeholder="********"  />
                  <small id="pass1Error" class="form-text text-muted"></small>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="mdp2">Confirmer le mot de passe</label>
                  <input type="password" id="mdp2" class="form-control form-control-lg" placeholder="********" />
                  <small id="passError" class="form-text text-muted"></small>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    J'accepte les <a href="#!" class="text-body"><u>Conditions d'utilisations</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button  type="submit"
                   class="btn btn-primary w-100 btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Vous avez deja un compte? <a href="<?=base_url?>login.php"
                    class="fw-bold text-body"><u>Connexion ici</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="<?= base_url?>public/js/utils.js"></script>
<script src="<?= base_url?>public/js/signup.js"></script>
</body>
</html>