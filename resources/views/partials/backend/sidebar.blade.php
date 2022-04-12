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
                    <li class="active">
                        <a href="{{ url('/admin') }}"> <i class="flaticon-computer-4"></i> Dashboard </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#frontend" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-home-fill"></i>
                        <span>Home Page Setting</span>
                        <i class="flaticon-right-arrow"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="frontend" data-parent="#accordionExample">
                    <li>
                        <a href="{{ url('/admin/sliders') }}"> Slider </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>