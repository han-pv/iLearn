<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("css/bootstrap-icons.min.css") }}">
  <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
</head>

<body>

  <div class="container-sm">
    <div>
      <a href="/teachers">Teachers</a>
    </div>
    <div>
      <a href="/students">Students</a>
    </div>

    <h1 class="text-danger">Home Page</h1>

    <h1>Bizin kurslarymyz</h1>
    @foreach ($courses as $course)
      <div class="h4 text-success">{{ $course }}</div>
    @endforeach

  </div>
</body>

</html>