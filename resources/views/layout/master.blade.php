<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.header')
    </head>
    <body class="sb-nav-fixed">
        @include('includes.nav')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('includes.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('includes.footer')
            </div>
        </div>
        @include('includes.script')
    </body>
</html>
