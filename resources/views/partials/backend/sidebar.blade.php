<div class="sidebar-wrapper sidebar-theme">
    
    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
    
    <nav id="sidebar">
        <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
            <li class="nav-item d-flex">
                <a href="index.html" class="navbar-brand">
                    <img src="{{ asset('backend/assets/img/logo-3.png') }}" class="img-fluid" alt="logo">
                </a>
                <p class="border-underline"></p>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> Equation </a>
            </li>
        </ul>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                    <li class="active">
                        <a href="{{ url('/admin') }}"> <i class="flaticon-computer-4"></i> Dashboard </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>