<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="app">
  <header class="app-header navbar">
    <!-- Header content here -->
  </header>
  <div class="app-body">
    <div class="sidebar">
      <!-- Sidebar content here -->
    </div>
    <main class="main">
      <!-- Main content here -->
      @yield('content')
    </main>
    <aside class="aside-menu">
      <!-- Aside menu content here -->
    </aside>
  </div>
  <footer class="app-footer">
    <!-- Footer content here -->
  </footer>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
