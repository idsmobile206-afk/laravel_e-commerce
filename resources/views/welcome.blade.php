<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

<body class=" text-gray-200">

<div class="flex min-h-screen">

  <!-- SIDEBAR -->
  @include('navbar.nav')

  <!-- PAGE CONTENT -->
  <main class="flex-1 ml-64 p-6 overflow-auto">
      @yield('content')
  </main>

</div>

</body>
</html>
