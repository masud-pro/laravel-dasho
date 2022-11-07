<nav class="pcoded-navbar menupos-fixed menu-dark menu-item-icon-style6 ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            <a href="#" class="b-brand">
                <!-- <div class="b-bg">
  <i class="fas fa-bolt"></i>
 </div>
 <span class="b-title">Dasho</span> -->
                <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="logo images">
                <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="" class="logo-thumb images">
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div   ">



            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="dashboard" class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li data-username="dashboard" class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                        <span class="pcoded-mtext">User</span>
                    </a>
                </li>

                <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                    class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                        <span class="pcoded-mtext">Stock Products</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('brands.index') }}" class="">Brand</a></li>
                        <li class=""><a href="{{ route('categories.index') }}" class="">Category</a></li>
                        <li class=""><a href="#" class="">Sales</a></li>
                        <li class=""><a href="#" class="">Helpdesk<span
                                    class="pcoded-badge label label-danger">NEW</span></a></li>
                    </ul>
                </li>



                <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-layers"></i></span><span class="pcoded-mtext">Widget</span><span
                            class="pcoded-badge label label-success">100+</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="#" class="">Statistic</a></li>
                        <li class=""><a href="#" class="">Data</a></li>
                        <li class=""><a href="#" class="">Chart</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>UI Element</label>
                </li>
                <li data-username="basic components button alert badges breadcrumb pagination progress tooltip popovers carousel cards collapse tabs pills modal spinner grid system toasts typography extra shadows embeds"
                    class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="#" class="">Alert</a></li>
                        <li class=""><a href="#" class="">Button</a></li>

                        <li class="">
                            <a href="#" class="">Toasts<span
                                    class="pcoded-badge label label-danger">NEW</span></a>
                        </li>
                        <li class=""><a href="#" class="">Utilities</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Administration</label>
                </li>
                <li data-username="dashboard" class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-sliders"></i></span>
                        <span class="pcoded-mtext">Setting</span>
                    </a>
                </li>

            </ul>

            {{-- <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Upgrade to pro</h6>
                    <p>upgrade for get full themes and 30min support</p>
                    <a href="#!" target="_blank"
                        class="btn btn-gradient-primary btn-sm text-white m-0">Upgrade</a>
                </div>
            </div> --}}



        </div>

    </div>
</nav>
