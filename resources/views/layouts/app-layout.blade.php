<!DOCTYPE html>
    <head>
        <title>@yield('title')</title>
    
        @include('_partials_.pos.meta')
        @include('_partials_.pos.css')
    
    </head>
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        <div id="app">
            <!-- BEGIN: Header-->
        @include('_partials_.pos.header')
        <!-- END: Header-->

        <!-- BEGIN: Main Menu-->
        @include('_partials_.pos.sidebar')
        <!-- END: Main Menu-->

        <!-- BEGIN: Main Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    @yield('page-content')
                </div>
            </div>
        </div>
        <!-- END: Main Content-->
        
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        @include('_partials_.pos.footer')
        <!-- END: Footer-->
        </div>
        
        @include('_partials_.pos.js')
        
    </body>
</html>
