<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-[260px]">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-center mb-6">Edit User</h2>

                @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block font-medium mb-1">Nama</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                    </div>

                    <div>
                        <label for="email" class="block font-medium mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                    </div>

                    <div>
                        <label for="role" class="block font-medium mb-1">Role</label>
                        <select id="role" name="role"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        </select>
                    </div>

                    <div>
                        <label for="password" class="block font-medium mb-1">Password Baru</label>
                        <input type="password" id="password" name="password"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            autocomplete="new-password" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('admin.users') }}"
                            class="px-4 py-2 rounded bg-gray-300 text-gray-800 hover:bg-gray-400 transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
