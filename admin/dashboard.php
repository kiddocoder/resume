<?php
include("../root.php");
include(Root_path."functions/main-functions.php");
$user = getUser();
include(Root_path."includes/heade_admin.php");
include(Root_path."includes/header_admin.php");
include(Root_path."includes/siderbar_admin.php");
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
