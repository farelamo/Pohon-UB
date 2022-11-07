<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>
  <body>
    @yield('content')
    @include('partials.script')
    @yield('script')
  </body>
</html>