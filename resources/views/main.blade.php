<!DOCTYPE html>
<html lang = "en">
<head>
  @include('_heads')
</head>
<body>
      <!-- Default bootstrap Navbar-->
  @include('_nav')
  <div class="container">
    {{ Auth::check() ? "LoggedIn":"LoggedOut"}}
  @yield('content')
  <hr>
  <p class="text-right"><b> Copyright laravel All rights reserved</p>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
