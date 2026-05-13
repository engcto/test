<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create User - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white antialiased">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-slate-800 rounded-xl border border-slate-700 shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-400">Create New User</h2>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                @csrf
                
                {{-- Name Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border @error('name') border-red-500 @else border-slate-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border @error('email') border-red-500 @else border-slate-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Password</label>
                    <input type="password" name="password" required
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border @error('password') border-red-500 @else border-slate-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password Field --}}
                <div>
                    <label class="block text-sm font-medium text-slate-400">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full mt-1 px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg transition duration-200">
                        Create User
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <a href="/" class="text-sm text-slate-500 hover:text-slate-300">← Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>