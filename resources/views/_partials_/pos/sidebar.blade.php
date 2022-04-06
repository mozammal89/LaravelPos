<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" id="sidebar" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true "  style="display: none"  >
    @include('_partials_.pos.logo')
    {{-- <div class="shadow-bottom"></div> --}}
    <div class="main-menu-content">
        <ul class="navigation navigation-main" style="margin-bottom: 100px" id="main-menu-navigation"
            data-menu="menu-navigation">
            <li class=" nav-item active"><router-link to="#"><i class="feather icon-home"></i><span class="menu-title"
                        data-i18n="Dashboard">Dashboard</span></router-link>
                {{-- <ul class="menu-content">
                        <li class="active"><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                        </li>
                        <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
                        </li>
                    </ul> --}}
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                        data-i18n="Ecommerce">Employee</span></a>
                <ul class="menu-content">
                    <li><router-link to="/store-employee"><i class="feather icon-plus"></i><span
                                class="menu-item" data-i18n="Shop">Add Employee</span></router-link>
                    </li>
                    <li><router-link to="/employee-list"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Wish List">All Employee</span></router-link>
                    </li>
                </ul>
            </li>

            {{-- <li class=" nav-item"><a href="#"><i class="feather icon-dollar-sign"></i><span
                        class="menu-title" data-i18n="Dashboard">Suppliers</span></a></li> --}}

            <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title"
                        data-i18n="Ecommerce">Suppliers</span></a>
                <ul class="menu-content">
                    <li><router-link to="/store-supplier"><i class="feather icon-plus"></i><span
                                class="menu-item" data-i18n="Shop">Add Suppliers</span></router-link>
                    </li>
                    <li><router-link to="/supplier-list"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">All Suppliers</span></router-link>
                    </li>
                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title"
                        data-i18n="Ecommerce">Category</span></a>
                <ul class="menu-content">
                    <li><router-link to="/store-category"><i class="feather icon-plus"></i><span
                                class="menu-item" data-i18n="Shop">Add Category</span></router-link>
                    </li>
                    <li><router-link to="/category-list"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">All Category</span></router-link>
                    </li>
                </ul>
            </li>

            {{-- <li class=" nav-item"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title"
                        data-i18n="Ecommerce">Billing </span></a>
                <ul class="menu-content">
                    <li><a href="#"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">Add Fund</span></a>
                    </li>
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">My Invoices</span></a>
                    </li>
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">My Transactions</span></a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class=" nav-item"><a href="#"><i class="feather icon-file-text"></i><span class="menu-title"
                        data-i18n="Ecommerce">Report </span></a>
                <ul class="menu-content">
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">Delivery Report</span></a>
                    </li>
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">Usages Report</span></a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class=" navigation-header"><span>Profile</span></li>
            <li class=" nav-item"><a href="index.html"><i class="feather icon-user"></i><span
                        class="menu-title" data-i18n="Dashboard">My Profile</span></a></li>
            <li class=" nav-item"><a href="index.html"><i class="feather icon-lock"></i><span
                        class="menu-title" data-i18n="Dashboard">Change Password</span></a></li>
            <li class=" navigation-header"><span>Developers</span></li>
            <li class=" nav-item"><a href="index.html"><i class="feather icon-globe"></i><span
                        class="menu-title" data-i18n="Dashboard">API Key</span></a></li>
            <li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span
                        class="menu-title" data-i18n="Dashboard">API Documentation</span></a></li> --}}


        </ul>
    </div>
</div>
