<?php
include("../../../root.php");

include(Root_path."functions/main-functions.php");
include(Root_path."includes/heade_admin.php");
include(Root_path."includes/header_admin.php");
include(Root_path."includes/siderbar_admin.php");


include(Root_path."functions/identities.func.php");

if(!isset($_SESSION['uid'])){
      $url = base_url.'login.php';
      echo "<script>window.location.href='{$url}'</script>";
      exit;
}

$user = getUser();
$identities = getUserIdentity($_SESSION['uid']);

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $user->nom ?> <?= $user->prenom ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?page=cv">MON CV</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Tabs</h5>

              <div class="tab-content pt-2" id="myTabContent">

                    <div class="  active" >
                    <form method="post"  >
                    <h2 class="card-title text-center"> Identités</h2>

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <input type="text" name="description" placeholder="Description de sois dans deux lignes" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label">Numero</label>
                      <div class="col-sm-10">
                        <input name="telephone" type="number" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance</label>
                      <div class="col-sm-10">
                        <input name="birthday" type="date" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Localisation(pays)</label>
                      <div class="col-sm-10">
                        <input name="pays" type="text" class="form-control" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Grade</label>
                      <div class="col-sm-10">
                        <input name="grade" type="text" placeholder="Niveau d'etude" class="form-control" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Validation</label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                      </div>
                    </div>

                  </form>
                  </div>

              </div>

              <!-- End Default Tabs -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main>


<?php include(Root_path."includes/js-include_admin.php"); ?>
<!-- ======= Footer ======= -->
<?php include(Root_path."includes/footer.php"); ?>
