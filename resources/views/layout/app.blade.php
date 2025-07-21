<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('partials.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('partials.navbar')
        @include('partials.alert')

        @yield('content')

        @include('partials.footer')
    </main>
    @include('partials.script')
</body>

</html>
