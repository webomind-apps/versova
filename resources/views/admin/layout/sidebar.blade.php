{{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"
        style="background-color:#fff; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)">
        <div class="sidebar-brand-icon">
            <img src="" height="72px" style="margin-top: 2px">
        </div>
    </a>


    <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Users</span></a>
    </li>
   

    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block">

</ul> --}}


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="" alt="" height="50px">
        </div>
        <div class="sidebar-brand-text mx-3"> VERSOVA </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Pages
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner">
                {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
                <a class="collapse-item" href="{{ route('admin.super-admin.index') }}"><span>-</span> Super Admin
                </a>
                <a class="collapse-item" href="{{ route('admin.customer-company.index') }}"><span>-</span> Customer
                </a>
                <a class="collapse-item" href="{{ route('admin.sales-person.index') }}"><span>-</span> Sales Person
                </a>
                {{-- <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html"><span>-</span> 404 Page</a>
                <a class="collapse-item" href="blank.html"><span>-</span> Blank Page</a> --}}
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->segment(2) == 'category' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.category.index')}}">
            <i class="fas fa-usd-circle"></i>
            <span> Category </span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'sub-category' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.sub-category.index')}}">
            <i class="fas fa-usd-circle"></i>
            <span>Sub Category </span></a>
    </li>
    {{-- <li class="nav-item {{ request()->segment(2) == 'products' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.product.index')}}">
            <i class="fas fa-usd-circle"></i>
            <span> Products </span></a>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
