<div class="sidebar-wrapper sidebar-theme">
    
    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
    
    <nav id="sidebar">
        <ul class="navbar-nav theme-brand text-center">
            <li class="nav-item">
                <a href="{{ url('/admin') }}" class="navbar-brand">
                    <img src="{{ asset('backend/assets/img/logo-3.png') }}" class="img-fluid" alt="logo">
                </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <ul class="collapse submenu list-unstyled show">
                    <li class="active main-menu">
                        <a href="{{ url('/admin') }}"> <i class="flaticon-computer-4"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/sliders') }}"> <i class="flaticon-picture"></i> Slider Manager </a>
                    </li>   
                    <li>
                        <a href="{{ url('/admin/menu-builder') }}"> <i class="flaticon-circle-menu-dot"></i> Menu Manager </a>
                    </li>                    
                </ul>
            </li>
        </ul>
    </nav>

</div>