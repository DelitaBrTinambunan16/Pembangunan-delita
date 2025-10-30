@extends('layouts.app')

@section('content')
<h1>Detail Warga</h1>
<a href="{{ route('warga.index') }}">Kembali</a>

<ul>
    <li><strong>ID:</strong> {{ $warga->warga_id }}</li>
    <li><strong>NIK:</strong> {{ $warga->nik }}</li>
    <li><strong>Nama:</strong> {{ $warga->nama_warga }}</li>
    <li><strong>No HP:</strong> {{ $warga->no_hp }}</li>
    <li><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</li>
    <li><strong>Tanggal Lahir:</strong> {{ $warga->tanggal_lahir }}</li>
    <li><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</li>
</ul>
@endsection
