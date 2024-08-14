<!-- resources/views/layouts/app.blade.php -->

<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.5rem;
            color: #343a40;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            vertical-align: middle;
            text-align: center;
        }

        .form-select, .btn {
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <!-- Your application content -->
    @yield('content')

    <!-- Echo and Pusher setup -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/laravel-echo@1.11.0/dist/echo.iife.js"></script>
    <script src="{{ mix('js/notifications.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
