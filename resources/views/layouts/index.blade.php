<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>
  <body>
    <div id="app">
      @include('partials.sidebar')
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        @yield('content')
        @include('partials.footer')
      </div>
    </div>
    @include('partials.script')
    @yield('script')
  </body>
</html>