<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Access Denied</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <i class="fa fa-lock fa-5x"></i>
        <h1 class="mt-3">Access Denied</h1>
    </div>
</body>
</html>
