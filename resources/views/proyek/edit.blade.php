@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Proyek</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proyek.update', $proyek->proyek_id) }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Nama Proyek</label>
            <input type="text" name="nama_proyek" class="w-full border rounded px-3 py-2" value="{{ old('nama_proyek', $proyek->nama_proyek) }}">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Lokasi</label>
            <input type="text" name="lokasi" class="w-full border rounded px-3 py-2" value="{{ old('lokasi', $proyek->lokasi) }}">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="w-full border rounded px-3 py-2" value="{{ old('tanggal_mulai', $proyek->tanggal_mulai) }}">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="w-full border rounded px-3 py-2" value="{{ old('tanggal_selesai', $proyek->tanggal_selesai) }}">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Perencanaan" {{ $proyek->status == 'Perencanaan' ? 'selected' : '' }}>Perencanaan</option>
                <option value="Berjalan" {{ $proyek->status == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                <option value="Selesai" {{ $proyek->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Anggaran</label>
            <input type="number" name="anggaran" class="w-full border rounded px-3 py-2" value="{{ old('anggaran', $proyek->anggaran) }}">
        </div>

        <div class="flex justify-between mt-4">
            <a href="{{ route('proyek.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Kembali</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
