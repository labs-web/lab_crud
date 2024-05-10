
<li class="nav-item has-treeview">
    <a href="#" class="nav-link nav-link {{ Request::is('projets*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion des Projets
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="{{ route('projets.index') }}" class="nav-link nav-link {{ Request::is('projets*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Projets</p>
            </a>
        </li>
    </ul>

</li>

