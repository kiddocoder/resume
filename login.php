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
               <img class="img-fluid flex fill" style="border-radius: 1rem 0 0 1rem;" src="<?=base_url?>public/images/cv-write.jpeg" alt="cv">
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?=base_url?>validators/checkLogin.php" method="POST" id="login-form">

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez-vous à votre compte</h5>
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
                    <button  type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="<?=base_url?>signup.php"
                      style="color: #393f81;">Register here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url?>public/js/utils.js"></script>
<script src="<?= base_url?>public/js/auth.js"></script>
</body>
</html>