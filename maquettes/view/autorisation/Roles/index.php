<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

  <div class="wrapper">
    <!-- Navigation -->
    <?php include_once "../../layouts/nav.php" ?>
    <!-- Barre latérale -->
    <?php include_once "../../layouts/aside.php" ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Role</h1>
              </div>
              <div class="col-sm-6">

                <div class="float-sm-right mr-2">
                  <a href="./create.php" class="btn btn-info">
                    <i class="fas fa-plus"></i> Ajouter un Rôle
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header col-md-12">
                  <div class=" p-0">
                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Recherche">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body table-responsive p-0">
                  <table class="table table-striped text-nowrap">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>chef_de_projet</td>
                        <td class="text-center">
                          <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                          <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>admin</td>
                        <td class="text-center">
                          <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                          <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>utilisateur</td>
                        <td class="text-center">
                          <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                          <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="d-flex justify-content-between align-items-center p-2">
                  <div class="d-flex align-items-center mb-2">
                    <button type="button" class="btn  btn-default btn-sm">
                      <i class="fa-solid fa-file-arrow-down"></i>
                      IMPORTER</button>
                    <button type="button" class="btn  btn-default btn-sm mt-0 mx-2">
                      <i class="fa-solid fa-file-export"></i>
                      EXPORTER</button>
                  </div>
                  <div class="mr-5">
                    <ul class="pagination  m-0 float-right">
                      <li class="page-item"><a class="page-link text-secondary" href="#">«</a></li>
                      <li class="page-item"><a class="page-link text-secondary active" href="#">1</a></li>
                      <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                      <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                      <li class="page-item"><a class="page-link text-secondary" href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Inclure le pied de page -->
    <?php include_once "../../layouts/footer.php" ?>

  </div>

  <!-- Inclure le script -->
  <?php include_once "../../layouts/script-link.php" ?>
</body>

</html>