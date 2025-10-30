@extends('layouts.app')

@section('title', 'Data Proyek')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Data Proyek</h1>
    <a href="{{ route('proyek.create') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Tambah Proyek</a>
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
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Proyek</th>
                <th class="px-4 py-2">Lokasi</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyek as $index => $proyek)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $proyek->nama_proyek }}</td>
                <td class="px-4 py-2">{{ $proyek->lokasi }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('proyek.edit', $proyek->proyek_id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded shadow">Edit</a>
                    <form action="{{ route('proyek.destroy', $proyek->proyek_id) }}" method="POST" class="inline">
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
