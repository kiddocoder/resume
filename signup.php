<?php
include("./root.php");
include(Root_path."vendor/autoload.php");

use App\classes\User;

// hundle check before inserting into DB
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user = new User();
  $errors = $user->insertUser($_POST);
}
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

                  <?php if(isset($errors['errorsignup'])){?>
                    <div class="card gb-danger mb-2" id="error_login">
                      <div class="card-content gb-danger text-center p-2">
                        <h6 class="gb-danger text-danger" >
                          <?php echo($errors['errorsignup']['message']);?>
                        </h6>
                      </div>
                    </div>
                    <?php
                      }
                    ?>

            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Creér Votre compte gratuitement</h2>

              <form enctype="multipart/form-data" method="POST" id="signup-for">
                <div class="form-outline mb-4">
                  <label class="form-label" for="nom">Nom</label>
                  <input type="text" id="nom" name="nom" class="form-control form-control-lg" placeholder="Doe" required/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="prenom">Prénom</label>
                  <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" placeholder="John" required />
                </div>

                <div class="form-outline mb-4"> <div id="preview"></div>

                  <label for="profile">Photo de profile</label>
                  <input type="file" id="profile" name="fileImg" accept="image/png,jpg,gif,png,jpg,jpeg,PNG,JPG" onchange="previewImage(event)" class="form-control form-control-lg" required/>
                </div>

                <div  class="form-outline mb-4">
                  <label class="form-label" for="email">Votre Adresse email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="janedoe@gmail.com" required/>
                  <small id="emailError" class="form-text text-muted"></small>
                </div>

                <div  class="form-outline mb-4">
                  <label class="form-label" for="adress">Adresse Physique</label>
                  <input type="text" id="adress" name="adress" class="form-control form-control-lg" placeholder="RN10,Goma" required/>
                  <small id="adressError" class="form-text text-muted"></small>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="mdp">Mot de passe</label>
                  <input type="text" id="mdp" name="mdp" class="form-control form-control-lg"  placeholder="********"  />
                  <small id="pass1Error" class="form-text text-muted"></small>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="mdp">Confirmation du Mot de passe</label>
                  <input type="text" id="mdp" name="mdp2" class="form-control form-control-lg"  placeholder="********"  />
                  <small id="pass1Error" class="form-text text-muted"></small>
                </div>
            
                <div class="d-flex justify-content-center">
                  <button  type="submit" name="inscription"
                   class="btn btn-primary w-100 btn-lg gradient-custom-4 text-body">Créer Mon compte</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Vous avez deja un compte? <a href="index.php?page=login"
                    class="fw-bold text-body"><u>Connexion ici</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- previeu de l'image  -->
<script>
  function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function(){
          var output = document.getElementById('preview');
          output.innerHTML = '<img src="'+ reader.result +'" width="200"/>';
      };
      reader.readAsDataURL(event.target.files[0]);
  }
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
      let loginError = document.getElementById("error_login");

      if(loginError) setTimeout(() => {
        loginError.style.display = 'none';
      }, 5000);
</script>
</body>
</html>