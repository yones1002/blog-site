<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجله فایر - هنر، طراحی و معماری</title>
    <link href="{{ asset('css/front/main.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <base target="_blank">
</head>
<body>
@include('layout.header')

@include('layout.subheader')

@yield('content')

@include('layout.footer')

</body>
</html>
