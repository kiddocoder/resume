<?php
include("../root.php");
include(Root_path."functions/main-functions.php");
include(Root_path."includes/heade_admin.php");
include(Root_path."includes/header_admin.php");
include(Root_path."includes/siderbar_admin.php");


include(Root_path."functions/languages.func.php");


$user = getUser();
$langues[] = getAllLanguages();// fetch all languages
$languesUser[] = getUserLanguage($_SESSION['uid']);// fetch user languages

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $user->nom ?> <?= $user->prenom ;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?page=cv">MON CV</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <section class="section row">
    <div class="col-lg-12">

     <div class="col-xxl-4 col-md-6"> <!--  Card -->

      <div class="card info-card">
       <div class="card-body">
        <h5 class="card-title">Langues <span>| Totals</span></h5>
        <div class="d-flex align-items-center">
         <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-newspaper"></i>
         </div>
         <div class="ps-3">
          <h6><?=count($langues)?></h6>
         </div>
        </div>
       </div>
      </div><!-- End  Card -->

      <div class="card info-card">
       <div class="card-body">
        <h5 class="card-title">Langues parlées <span>| Totals</span></h5>
        <div class="d-flex align-items-center">
         <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-newspaper"></i>
         </div>
         <div class="ps-3">
          <h6><?=count($languesUser)?></h6>
         </div>
        </div>
       </div>
      </div><!-- End  Card -->

     </div><!-- end of cards sections -->

     <!-- Table des  langues-->
     <div class="col-12">
      <div class="card recent-sales overflow-auto">
       <div class="card-body">

       <div class="report-header justify-content-between mb-5" style="display: flex;">
           <h5 class="card-title">Listes des langues</h5>
            <button onclick="window.location.href='./forms/add/addeducation.php'" class="btn btn-primary mt-2">Ajouter une langue </button>
        </div>

        <div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
        <table class="table table-striped" id="data_tables">
         <thead>
          <tr>
           <th scope="col">#</th>
           <th scope="col">Langue</th>
           <th scope="col">Actions</th>
          </tr>
         </thead>
         <tbody>
           <?php $i=1; foreach($langues as $lang) {?>
             <tr>
                 <td><?= $i++;?></td>
                 <td><?php echo htmlspecialchars($lang['langue']);?></td>
                 <td>
                  <button class="btn btn-danger" onclick="window.location.href = '#'"><i class="bi bi-trash-fill"></i></button>

                 <button class="btn btn-success" onclick="window.location.href = '#'"><i class="bi bi-pen-fill"></i></button>
               </td>

             </tr>
             <?php
             }
             ?>
         </tbody>
        </table>
       </div>

       </div>
      </div>
     </div><!-- End Recent Sales -->
    </div>
   </section>
  </main>
<?php include(Root_path."includes/js-include_admin.php"); ?>
<!-- ======= Footer ======= -->
<?php include(Root_path."includes/footer.php"); ?>