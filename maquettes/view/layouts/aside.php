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
                <li class="nav-item">
                    <a href="/view/GestionProjets/taches/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'taches') !== false) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Tâches
                        </p>
                    </a>
                </li>
                <!-- MEMBRE -->

                <li class="nav-item">
                    <a href="/view/GestionProjets/members/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'members') !== false) ? 'active' : ''; ?>">
                        <i class="fa-solid fa-users pl-1 pr-1"></i>
                        <p>
                            Members
                        </p>
                    </a>
                </li>

                <!-- Authorisation -->
                <li class="nav-item has-treeview">
                    <a href="#"
                        class="nav-link <?php echo (strpos($current_route, 'autorisation') !== false) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Autorisations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/view/GestionProjets/utilisateurs/index.php"
                                class="nav-link <?php echo (strpos($current_route, 'utilisateurs') !== false) ? 'active' : ''; ?>">
                                <i class="fa-solid fa-users pl-1 pr-1"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/view/autorisation/Autorisations/index.php"
                                class="nav-link <?php echo (strpos($current_route, 'Autorisations') !== false) ? 'active' : ''; ?>">
                                <i class="far fa-check-circle nav-icon"></i>
                                <p>Autorisation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/view/autorisation/roles/index.php"
                                class="nav-link <?php echo (strpos($current_route, 'roles') !== false) ? 'active' : ''; ?>">
                                <i class="far fa-user-circle nav-icon"></i>
                                <p>Rôle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/view/autorisation/Controllers/index.php"
                                class="nav-link <?php echo (strpos($current_route, 'Controllers') !== false) ? 'active' : ''; ?>">
                                <i class="fas fa-gamepad nav-icon"></i>
                                <p>Controllers</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/view/autorisation/Actions/index.php"
                                class="nav-link <?php echo (strpos($current_route, 'Actions') !== false) ? 'active' : ''; ?>">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>Actions</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>