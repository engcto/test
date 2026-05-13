<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white antialiased">
    <div class="max-w-6xl mx-auto p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-blue-400">Registered Users</h2>
            <div class="space-x-4">
                <a href="/" class="text-slate-400 hover:text-white transition">Home</a>
                <a href="{{ route('users.create') }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg font-bold transition">
                    + Add User
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-900/50 border border-emerald-500 text-emerald-200 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden shadow-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-700/50">
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($users as $user)
                        <tr class="hover:bg-slate-700/30 transition">
                            <td class="px-6 py-4 font-medium text-white">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-slate-500 text-sm">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-slate-500 italic">
                                No users found in the database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>