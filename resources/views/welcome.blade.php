<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel - engcto/test</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="bg-slate-900 text-white antialiased">
        <div class="relative flex items-center justify-center min-h-screen">
            <div class="max-w-4xl mx-auto p-6 text-center">
                
                <h1 class="text-5xl font-extrabold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-emerald-400">
                    Laravel 11 Initialized
                </h1>
                <p class="text-xl text-slate-400 mb-8">
                    Repository: <span class="text-emerald-400 font-mono">engcto/test</span>
                </p>

                <div class="mb-12 flex justify-center gap-4">
                    <a href="{{ route('users.index') }}" class="px-8 py-3 bg-slate-700 hover:bg-slate-600 rounded-full font-bold transition duration-200">
                        View All Users
                    </a>
                    <a href="{{ route('users.create') }}" class="px-8 py-3 bg-blue-600 hover:bg-blue-500 rounded-full font-bold transition duration-200">
                        Add New User
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                    <div class="p-6 bg-slate-800 rounded-xl border border-slate-700">
                        <h3 class="text-lg font-bold text-blue-400">Documentation</h3>
                        <p class="text-sm text-slate-500 mt-2">Laravel has wonderful, thorough documentation covering every aspect of the framework.</p>
                    </div>
                    <div class="p-6 bg-slate-800 rounded-xl border border-slate-700">
                        <h3 class="text-lg font-bold text-emerald-400">Laracasts</h3>
                        <p class="text-sm text-slate-500 mt-2">Laracasts offers thousands of video tutorials on Laravel and PHP development.</p>
                    </div>
                    <div class="p-6 bg-slate-800 rounded-xl border border-slate-700">
                        <h3 class="text-lg font-bold text-red-400">Vite</h3>
                        <p class="text-sm text-slate-500 mt-2">Vite provides a lightning-fast development experience for modern web projects.</p>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    background: '#1e293b',
                    color: '#fff',
                    confirmButtonColor: '#2563eb'
                });
            </script>
        @endif
    </body>
</html>