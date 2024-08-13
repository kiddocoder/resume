<?php
include("../../../root.php");

include(Root_path."functions/main-functions.php");
include(Root_path."includes/heade_admin.php");
include(Root_path."includes/header_admin.php");
include(Root_path."includes/siderbar_admin.php");

if(!isset($_SESSION['uid'])){
  $url = base_url.'login.php';
  echo "<script>window.location.href='{$url}'</script>";
  exit;
}

include(Root_path."functions/languages.func.php");


$user = getUser();
$langues[] = getAllLanguages();// fetch all languages
$languesUser[] = getUserLanguage($_SESSION['uid']);// fetch user languages

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

                       <!-- EDUCATION  -->
                  <div class="  active" >
                    <form action="" method="post">
                    <h2 class="card-title text-center">EDUCATION</h2>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Formation</label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="Nom de la formation" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Date de Début</label>
                      <div class="col-sm-10">
                        <input type="date" name="date_debut" placeholder="EX: 2005-02-09" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Date de Début</label>
                      <div class="col-sm-10">
                        <input type="date" name="date_fin" placeholder="EX:2005-02-09" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Etablissement/Université</label>
                      <div class="col-sm-10">
                        <input type="date" name="etablissement" placeholder="Nom de l'etablissement ou université frequenté" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Diplome obtenu</label>
                      <div class="col-sm-10">
                        <input type="text" name="diplome" placeholder="Le diplome obtenu" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputPassword" class="col-sm-2 col-form-label"> Formation educative</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="description" placeholder="Toute la description sur la formation faite en education  " style="height: 100px"></textarea>
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
