<div class="main-sidebar sidebar-style-3">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <a href="index.html">Stisla</a> --}}
            <a href="{{ route('index') }}">
                <img src="../../assets/image/logo.png" class="relative" alt="">
            </a>
        </div>
        {{-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div> --}}
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Route::currentRouteNamed('dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Pengaturan</li>
            <li class="nav-item dropdown {{ Route::currentRouteNamed('dashboard.setting.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.setting.index') }}" class="nav-link"><i
                        class="fas fa-gear"></i><span>Pengaturan</span></a>
            </li>
            
    </aside>
</div>
