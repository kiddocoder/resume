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
                    <!-- Compétences -->
                    <div class="  active" >
                    <form action="" method="post">
                    <h2 class="card-title text-center"> Compétences Languistique</h2>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Langue</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="language">
                          <option value="" selected desabled>Quelle votre langue parlé?</option>
                          <?php foreach ($langues as $lang) {?>
                            <option value="<?= $lang['lid']?>"><?= $lang['langue']?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Niveau sur 100(%)</label>
                      <div class="col-sm-10">
                        <input type="number" name="niveau" min="1" max="100" placeholder="Niveau 50 ou 80 par example" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Validation</label>
                      <div class="col-sm-10">
                        <button type="submit"  class="btn btn-primary">Envoyer</button>
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
