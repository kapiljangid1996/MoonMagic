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
                    <li>
                        <a href="{{ url('/admin/page-manager') }}"> <i class="flaticon-simple-screen-line"></i> Page Manager </a>
                    </li> 
                    <li>
                        <a href="{{ url('/admin/category') }}"> <i class="flaticon-left-dot-menu"></i> Category Manager </a>
                    </li> 
                    <li>
                        <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-cart-bag-2"></i>
                                <span>Product</span>
                            </div>

                            <div class="ml-3 mt-1">
                                <small><i class="flaticon-right-arrow"></i></small>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="product" data-parent="#accordionExample">
                            <li>
                                <a href="{{ url('/admin/shape-manager') }}"> <i class="flaticon-3d-cube"></i> Shape Manager </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/material-manager') }}"> <i class="flaticon-tag"></i> Material Manager </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/meaning-manager') }}"> <i class="flaticon-notes-4"></i> Meaning Manager </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/gemstone-manager') }}"> <i class="flaticon-elements"></i> Gemstone Manager </a>
                            </li>
                        </ul>
                    </li>                   
                </ul>
            </li>
        </ul>
    </nav>

</div>