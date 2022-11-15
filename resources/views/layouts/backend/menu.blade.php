<ul class="navbar-nav bg-menu-dashboard sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 poppins-bold">Admin Classcode</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item poppins-light">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @role('admin')
        <div class="sidebar-heading poppins-bold">
            Admin Setting
        </div>


        <!-- Nav Item - user -->
        <li class="nav-item poppins-light">
            <a class="nav-link" href="{{ route('admin.user') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span></a>
        </li>
    @endrole

    <!-- Nav Item - kelas -->
    @role('admin|mentor')
        <li class="nav-item poppins-light">
            <a class="nav-link" href="{{ route('admin.kelas') }}">
                <i class="fas fa-fw fa-paste"></i>
                <span>Kelas</span></a>
        </li>
    @endrole

    <!-- Nav Item - kupon -->
    @role('admin')
        <li class="nav-item poppins-light">
            <a class="nav-link" href="{{ route('admin.promo') }}">
                <i class="fas fa-fw fa-percent"></i>
                <span>Kupon</span></a>
        </li>

        <!-- Nav Item - pembayaran -->
        <li class="nav-item poppins-light">
            <a class="nav-link" href="{{ route('admin.payment') }}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Metode Pembayaran</span></a>
        </li>
    @endrole

    @role('mentor')
        <!-- Nav Item - Pengaturan -->
        <li class="nav-item poppins-bold">
            <a class="nav-link" href="{{ route('admin.user.setting.mentor') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span></a>
        </li>
    @endrole

    <!-- Divider -->
    @role('admin')
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading poppins-bold">
        Status
    </div>
    <li class="nav-item poppins-light">
        <a class="nav-link" href="{{ route('admin.pending.kelas') }}">
            <i class="fas fa-th"></i>
            <span>Pending kelas</span></a>
    </li>
    @endrole
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item poppins-bold">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fas fa-arrow-circle-left"></i>
            <span>Kembali Ke Home</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <li class="nav-item poppins-bold">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span>
        </a>
    </li>

</ul>

@section('css-tambahan')
@endsection
