@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Detail Proyek</h1>

    <div class="space-y-2 text-gray-700 dark:text-gray-200">
        <p><strong>Nama Proyek:</strong> {{ $proyek->nama_proyek }}</p>
        <p><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
        <p><strong>Deskripsi:</strong> {{ $proyek->deskripsi ?? '-' }}</p>
        <p><strong>Tanggal Mulai:</strong> {{ $proyek->tgl_mulai ?? '-' }}</p>
        <p><strong>Tanggal Selesai:</strong> {{ $proyek->tgl_selesai ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $proyek->status ?? '-' }}</p>
    </div>

    <a href="{{ route('proyek.index') }}"
        class="mt-6 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
        Kembali
    </a>
</div>
@endsection
