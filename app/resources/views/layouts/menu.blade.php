<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Accueil
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projets.index') }}"
        class="nav-link {{ Request::is('projets*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Projets
        </p>
    </a>
</li>
{{-- @endcan --}}
