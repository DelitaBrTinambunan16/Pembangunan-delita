@extends('layouts.app')

@section('title', 'Data User')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Data User</h1>
    <a href="{{ route('user.create') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Tambah User</a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-white dark:bg-gray-800 shadow rounded p-4">
    <table class="min-w-full table-auto text-gray-800 dark:text-gray-100">
        <thead class="bg-gray-200 dark:bg-gray-700 text-left">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('user.edit', $user->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded shadow">Edit</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
