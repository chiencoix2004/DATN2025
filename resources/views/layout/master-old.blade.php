<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <html data-bs-theme="light" lang="en-US" dir="ltr">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="author" content="themesflat.com">
    <!-- Mobile Specific Metas -->
    {{-- @include('admin.assets.link-css') --}}
    @include('admin.assets.link-css')
</head>

<body class="body">

    <!-- #wrapper -->
    <main id="wrapper">
        <!-- #page -->
        {{-- <div id="page" class=""> --}}
        <!-- layout-wrap -->
        <div class="layout-wrap">
            <!-- section-menu-left -->
            @include('admin.assets.nav-bar-left')
            <!-- /section-menu-left -->
            <!-- section-content-right -->
            <div class="section-content-right">
                <!-- header-dashboard -->
                @include('admin.assets.header')
                <!-- /header-dashboard -->
                <!-- main-content -->
                <div class="main-content">
                    <!-- main-content-wrap -->
                    @yield('contents')
                    <!-- /main-content-wrap -->
                    <!-- bottom-page -->
                    <div class="bottom-page">
                        <div class="body-text">Copyright © 2024 Remos. Design with</div>
                        <i class="icon-heart"></i>
                        <div class="body-text">by <a
                                href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All rights
                            reserved.</div>
                    </div>
                    <!-- /bottom-page -->
                </div>
                <!-- /main-content -->
            </div>
            <!-- /section-content-right -->
        </div>
        <!-- /layout-wrap -->
        {{-- </div> --}}
        <!-- /#page -->
    </main>
    <!-- /#wrapper -->
    @include('admin.assets.link-js')
</body>

</html>
