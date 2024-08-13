<?php
include("../root.php");
include(Root_path."functions/main-functions.php");
include(Root_path."includes/heade_admin.php");
include(Root_path."includes/header_admin.php");
include(Root_path."includes/siderbar_admin.php");


include(Root_path."functions/identities.func.php");


$user = getUser();
$identities = getUserIdentity($_SESSION['uid']);

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

     <!-- Table des  langues-->
     <div class="col-12">
      <div class="card recent-sales overflow-auto">
       <div class="card-body">

        <div class="report-header justify-content-between mb-5" style="display: flex;">
           <h5 class="card-title">Mon Identité </h5>
            <button onclick="window.location.href='<?=base_url?>admin/forms/add/addidentities.php'" class="btn btn-primary mt-2">Ajouter Identité </button>
        </div>

      <div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
        <table class="table table-striped" id="data_tables">
         <thead>
          <tr>
           <th scope="col">#</th>
           <th scope="col"> Description </th>
           <th scope="col"> Telephone</th>
           <th scope="col">Birthday</th>
           <th scope="col"> Pays</th>
           <th scope="col"> Grade</th>
           <th scope="col">Delete</th>
           <th scope="col">Update</th>
          </tr>
         </thead>
         <tbody>
           <?php
             $i=1;
             if (!empty($identities) || !isset($identities)) {
             foreach($identities as $identity) {
            ?>
             <tr>
                 <td><?= $i++;?></td>
                 <td><?php echo htmlspecialchars($identity['description']);?></td>
                 <td><?php echo htmlspecialchars($identity['telephone']);?></td>
                 <td><?php echo htmlspecialchars($identity['birthday']);?></td>
                 <td><?php echo htmlspecialchars($identity['pays']);?></td>
                 <td><?php echo htmlspecialchars($identity['grade']);?></td>
                 <td><button class="btn" onclick="window.location.href = '#'"><i class="bi bi-trash-fill"></i></button></td>
                 <td><button class="btn" onclick="window.location.href = '#'"><i class="bi bi-pen-fill"></i></button></td>
             </tr>
             <?php
              }
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