@extends('layouts.app')

@section('title', 'Tambah Warga')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Tambah Warga</h2>

    <form action="{{ route('warga.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama_warga" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">No KTP</label>
                <input type="text" name="nik" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">Agama</label>
                <input type="text" name="agama" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Telepon</label>
                <input type="text" name="no_hp" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>

        </div>
        <div class="mt-4 flex gap-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Simpan</button>
            <a href="{{ route('warga.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">Kembali</a>
        </div>
    </form>
</div>
@endsection
