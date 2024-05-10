<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            {{ __('app.home') }}
        </p>
    </a>
</li>

@include('layouts.GestionProjets.GestionProjetsMenu')
