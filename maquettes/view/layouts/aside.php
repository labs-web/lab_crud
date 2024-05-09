<?php
$current_route = $_SERVER['REQUEST_URI'];
?>

<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">
    <!-- Logo de la marque -->
    <a href="/view/home.php" class="brand-link">
        <img src="/view/assets/images/logo.png" class="brand-image img-circle elevation-3" alt="Image de groupe">
        <span class="brand-text font-weight-light text-center h6">Gestion des Projets</span>
    </a>

    <!-- Barre latérale -->
    <div class="sidebar">
        <!-- Menu latéral -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/view/home.php"
                        class="nav-link <?php echo (strpos($current_route, 'home') !== false) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Accueil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/view/GestionProjets/projets/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'projets') !== false) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Projets
                        </p>
                    </a>
                </li>
 


            

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>