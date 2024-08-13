<?php
include("../root.php");
include(Root_path."functions/main-functions.php");
include(Root_path."includes/heade_admin.php");
include(Root_path."includes/header_admin.php");
include(Root_path."includes/siderbar_admin.php");
$user = getUser();
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
                  <!-- Statatique personnel -->
                  <div class="active">
                      <form action="" method="post">
                      <h2 class="card-title text-center"> Statistiques personnel </h2>
                      <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Recommandations</label>
                        <div class="col-sm-10">
                          <input type="number" name="recommandation" placeholder="Nombre de Recommandations déja eu" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Projects</label>
                        <div class="col-sm-10">
                          <input type="number"projects name="projects" placeholder="Nombre de projects déja realisé" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Experiences</label>
                        <div class="col-sm-10">
                          <input type="number" name="experiences" placeholder="Nombre de domaines sur le quel tu as l'experience" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Formations</label>
                        <div class="col-sm-10">
                          <input type="number" name="formation" placeholder="Nombre de formation deja participé" class="form-control">
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
                    <!-- Compétences -->
                    <div class="  active" >
                    <form action="" method="post">
                    <h2 class="card-title text-center"> Compétences Languistique</h2>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Langue</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="language">
                          <option value="" selected desabled>Quel ton langue parlé?</option>
                          <option value="FranÇais">FranÇais</option>
                          <option value="Anglais">Anglais</option>
                          <option value="Swahili">Swahili</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">Niveau sur 100</label>
                      <div class="col-sm-10">
                        <input type="number" name="niveau" min="1" max="100" placeholder="Niveau 50 ou 80" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                    <label for="other" class="col-sm-2 col-form-label">Autres langues parlé(e)</label>
                    <div class="col-sm-10">
                        <input type="number" name="other" min="1" max="100" placeholder="Niveau : Autre langue sur 100 ex 50 ou 80" class="form-control">
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Validation</label>
                      <div class="col-sm-10">
                        <button type="submit"  class="btn btn-primary">Envoyer</button>
                      </div>
                    </div>
                  </form>
                  </div>

                  <!-- Statatique personnel  -->

                  <div class="  active" >
                    <form action="" method="post">
                      <h2 class="card-title text-center"> Compétences Professionel </h>

                      <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Quelle votre competences professionels?</label>
                        <div class="col-sm-10">
                          <select class="form-control" required>
                            <option value="" selected desabled> Votre competence ?</option>
                            <option value="PROGRAMMATION WEB">PROGRAMMATION WEB</option>
                            <option value="MICROSOFT OFFICE">MICROSOFT OFFICE</option>
                            <option value="PHOTOSHOP">PHOTOSHOP</option>
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="other" class="col-sm-2 col-form-label"> Votre niveau?</label>
                        <div class="col-sm-10">
                          <input type="number" name="niveau" placeholder=" Niveau  sur 100 ex 50 ou 80" class="form-control">
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

                <div class="  active" >
                  <form action="" method="post">

                    <h2 class="card-title text-center"> Experience Professional</h2>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label"> Formation</label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="Nom de la formation" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label"> Année</label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="EX: 2002-2005" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputPassword" class="col-sm-2 col-form-label"> Formation educative</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" placeholder="Toute la description sur la formation faite en education  " style="height: 100px"></textarea>
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
