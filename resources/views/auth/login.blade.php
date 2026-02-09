<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap-icons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
</head>

<body>

    <div class="w-100">
        @error('username')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div class="d-flex justify-content-center align-items-center vh-100">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="" class="form-label">Username:</label>
                <input type="text" name="username" placeholder="Username" class="form-control" value="{{ old('username') }}">

                <label for="" class="form-label mt-3">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>