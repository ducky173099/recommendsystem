<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/user')}}">
            <span>User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/feature')}}">
            <span>feature</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/product')}}">
            <span>product</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/category')}}">
            <span>category</span>
        </a>
    </li>


</ul>