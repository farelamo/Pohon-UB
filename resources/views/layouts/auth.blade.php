<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('sweetalert::alert')
    @yield('content')
    @include('partials.script')
    @yield('script')
</body>

</html>
