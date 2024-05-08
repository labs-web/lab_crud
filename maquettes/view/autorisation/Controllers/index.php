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
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Controller</h1>
              </div>
              <div class="col-sm-6">
                <div class="float-sm-right">
                  <a href="#" class="btn btn-secondary">
                    <i class="fas fa-download"></i> Télécharger les Controllers
                  </a>
                  <a href="./create.php" class="btn btn-info">
                    <i class="fas fa-plus"></i> Ajouter un Controller
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
              <!-- Default box -->
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
                <!-- /.card-header -->

                <table class="table table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th>Nom de controller</th>
                      <th class="action-column" style="width: 150px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ProjetsController</td>
                      <td>
                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>UtilisteurController</td>
                      <td>
                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>TacheController</td>
                      <td>
                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <!-- Add more rows for other controllers -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2">
                        <ul class="pagination  m-0 float-right">
                          <li class="page-item"><a class="page-link text-secondary" href="#">«</a></li>
                          <li class="page-item"><a class="page-link text-secondary active" href="#">1</a></li>
                          <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                          <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                          <li class="page-item"><a class="page-link text-secondary" href="#">»</a></li>
                        </ul>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card -->
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