<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            {{ __('app.home') }}
        </p>
    </a>
</li>
{{-- project --}}
<li class="nav-item">
    <a href="{{ route('projets.index') }}"
        class="nav-link {{ Request::is('projets*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            {{ __('GestionProjets/projet.plural') }}
        </p>
    </a>
</li>
{{-- task --}}
<li class="nav-item">
    <a href="{{ route('tasks.index') }}"
        class="nav-link {{ Request::is('tasks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            {{ __('GestionProjets/tache.plural') }}
        </p>
    </a>
</li>

