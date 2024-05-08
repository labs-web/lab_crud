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

        <div class="content-wrapper" style="min-height: 1302.4px;">

            <div class="content-header">
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <h1>Editer l'action ajoute</h1>
                        <div class="col-md-12">

                            <div class="card card-card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Editer</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Obtenir le formulaire -->
                                    <div class="form-group">
                                        <label for="rActionName"> Controller </label>
                                        <select class="form-control" id="rActionName">
                                        <option selected>Projects Controller</option>
                                        <option value="1">Tache Controller</option>
                                        <option value="2">Action Controller</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rActionName"> Nom </label>
                                        <input type="text" class="form-control" id="rActionName" placeholder="Entrez le nom de l'action" value="create">
                                    </div>
                                    <div class="card-footer">
                                        <button href="index.php" type="submit" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>

        <!-- Inclure le pied de page -->
        <?php include_once "../../layouts/footer.php" ?>
        <!-- Inclure le script -->
        <?php include_once "../../layouts/script-link.php" ?>
    </div>
</body>

</html>