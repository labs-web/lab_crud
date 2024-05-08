<!DOCTYPE html>
<html lang="fr">

<?php include_once "./layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "./layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "./layouts/aside.php" ?>

        <div class="content-wrapper pt-4">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Bienvenue</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>15</h3>
                                    <p>Projets</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="./projets/index.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>23</h3>
                                    <p>Taches</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="./taches/index.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>60</h3>
                                    <p>Utilisateurs</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="./utilisateurs/index.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<!-- get script -->
<?php include_once "./layouts/script-link.php"; ?>

</html>