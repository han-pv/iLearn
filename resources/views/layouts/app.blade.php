<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLearn - Course Management System</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap-icons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
</head>

<body>
    @include('app.sidebar')
    
    <div class="main-content">
        @include('app.navbar')
        @yield('content')
    </div>

    <script src="{{ asset("js/main.js") }}"></script>
</body>

</html>