<!DOCTYPE html>
<html lang="en">
    <head>
        @include('teacher.includes.header')
    </head>
    <body class="sb-nav-fixed">
        @include('teacher.includes.nav')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('teacher.includes.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('teacher.includes.footer')
            </div>
        </div>
        @include('teacher.includes.script')
    </body>
</html>
