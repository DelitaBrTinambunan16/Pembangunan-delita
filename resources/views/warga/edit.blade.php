@extends('layouts.app')

@section('title', 'Edit Warga')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Edit Warga</h2>

    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama" value="{{ $warga->nama }}" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">No KTP</label>
                <input type="text" name="no_ktp" value="{{ $warga->no_ktp }}" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">Agama</label>
                <input type="text" name="agama" value="{{ $warga->agama }}" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Telepon</label>
                <input type="text" name="telepon" value="{{ $warga->telepon }}" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ $warga->email }}" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
        </div>

        <div class="mt-4 flex gap-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Simpan</button>
            <a href="{{ route('warga.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">Kembali</a>
        </div>
    </form>
</div>
@endsection
