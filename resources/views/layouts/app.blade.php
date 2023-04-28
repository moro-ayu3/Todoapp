<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Todoapp</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
  @yield('css')
</head>
<body class="font-sans antialiased">
  <div class="container">
    <div class="card">
      @yield('content')
    </div>
  </div>
</body>
</html>
