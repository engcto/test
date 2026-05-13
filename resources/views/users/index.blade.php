<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden shadow-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-700/50">
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($users as $user)
                        <tr class="hover:bg-slate-700/30 transition">
                            <td class="px-6 py-4 font-medium text-white">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->is_active)
                                    <span class="px-2 py-1 text-xs font-bold bg-emerald-900/50 text-emerald-400 border border-emerald-500/50 rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-bold bg-red-900/50 text-red-400 border border-red-500/50 rounded-full">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-sm">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right flex justify-end items-center space-x-4">
                                <form action="{{ route('users.toggle', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="{{ $user->is_active ? 'text-amber-400 hover:text-amber-300' : 'text-emerald-400 hover:text-emerald-300' }} font-medium transition text-sm">
                                        {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-400 hover:text-blue-300 font-medium transition text-sm">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="text-red-400 hover:text-red-300 font-medium transition text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500 italic">
                                No users found in the database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This user will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!',
                background: '#1e293b',
                color: '#fff'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            })
        }
    </script>

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