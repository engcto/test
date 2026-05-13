<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel - engcto/test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-primary">Laravel 11 Initialized</h1>
            <p class="lead text-muted">Repository: <code>engcto/test</code></p>
            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-outline-dark btn-lg">View All Users</a>
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg">Add New User</a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>Swal.fire({ icon: 'success', title: 'Success', text: "{{ session('success') }}" });</script>
    @endif
</body>
</html>