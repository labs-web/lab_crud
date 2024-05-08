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
                        <div class="col-md-12">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"> <i class="far fa-check-circle nav-icon"></i> Ajouter un Autorisation</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Obtenir le formulaire -->
                                    <?php include_once "./form.php" ?>
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

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Initialize select2
                $('#actionSelect1').select2();
            });
        </script>
    </div>
</body>

</html>
