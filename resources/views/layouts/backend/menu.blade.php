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
            <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.index') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Dashboard</span></a>
            </li>

            @role('admin')
                <li class="menu-header">Akses Admin</li>
                <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.user') ? 'active' : '' }}">
                    <a href="{{ route('admin.user') }}" class="nav-link"><i
                            class="fas fa-gear"></i><span>Pelanggan</span></a>
                </li>
            @endrole

            @role('admin|mentor')
                <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.kelas') ? 'active' : '' }}">
                    <a href="{{ route('admin.kelas') }}" class="nav-link"><i class="fas fa-gear"></i><span>Kelas</span></a>
                </li>
            @endrole

            @role('admin')
                <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.promo') ? 'active' : '' }}">
                    <a href="{{ route('admin.promo') }}" class="nav-link"><i class="fas fa-gear"></i><span>Kupon</span></a>
                </li>
                <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.payment') ? 'active' : '' }}">
                    <a href="{{ route('admin.payment') }}" class="nav-link"><i class="fas fa-gear"></i><span>Metode
                            Pembayaran</span></a>
                </li>
            @endrole

            @role('mentor')
                <li class="menu-header">Pengaturan</li>
                <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.user.setting.mentor') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.setting.mentor') }}" class="nav-link"><i
                            class="fas fa-gear"></i><span>Pengaturan</span></a>
                </li>
            @endrole

            @role('admin')
            <li class="menu-header">Konfirmasi Pelanggan</li>
                <li class="nav-item dropdown {{ Route::currentRouteNamed('admin.pending.kelas') ? 'active' : '' }}">
                    <a href="{{ route('admin.pending.kelas') }}" class="nav-link"><i
                            class="fas fa-gear"></i><span>Daftar Pending</span></a>
                </li>
            @endrole

    </aside>
</div>
