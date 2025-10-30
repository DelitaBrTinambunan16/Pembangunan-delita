@extends('layouts.app')

@section('title', 'Tambah users')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Tambah users</h2>

    <div class="mt-6 w-full max-w-lg">
        <form action="{{ route('user.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border rounded text-gray-700 dark:text-gray-200 dark:bg-gray-700">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border rounded text-gray-700 dark:text-gray-200 dark:bg-gray-700">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded text-gray-700 dark:text-gray-200 dark:bg-gray-700">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                <a href="{{ route('user.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
