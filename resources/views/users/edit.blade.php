<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-slate-900 text-white antialiased">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-slate-800 rounded-xl border border-slate-700 shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-400">Edit User</h2>

            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                {{-- Name Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border @error('name') border-red-500 @else border-slate-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border @error('email') border-red-500 @else border-slate-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 border-t border-slate-700">
                    <p class="text-xs text-slate-500 mb-4 italic">Leave password fields blank if you don't want to change it.</p>
                </div>

                {{-- Password Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">New Password</label>
                    <input type="password" name="password"
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border @error('password') border-red-500 @else border-slate-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Confirm New Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg transition duration-200">
                        Update User
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <a href="{{ route('users.index') }}" class="text-sm text-slate-500 hover:text-slate-300">← Back to List</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Please check the form for errors.',
                background: '#1e293b',
                color: '#fff',
                confirmButtonColor: '#ef4444'
            });
        </script>
    @endif
</body>
</html>