@extends('layouts.app')

@section('title', 'Kirim WhatsApp')

@section('content')
<div class="container px-6 mx-auto py-6">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Kirim WhatsApp</h2>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('wa.send') }}" method="POST">
            @csrf

            <label class="block mb-3">
                <span class="text-sm text-gray-700 dark:text-gray-300">Nomor tujuan (kode negara + nomor, contoh: 62812xxxx)</span>
                <input type="text" name="phone" value="{{ old('phone', $phone) }}"
                       class="mt-1 block w-full form-input rounded border px-3 py-2"
                       placeholder="62812xxxxxxxx" />
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </label>

            <label class="block mb-3">
                <span class="text-sm text-gray-700 dark:text-gray-300">Pesan</span>
                <textarea name="message" rows="5"
                          class="mt-1 block w-full form-textarea rounded border px-3 py-2"
                          placeholder="Tulis pesan...">{{ old('message') }}</textarea>
                @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </label>

            <div class="flex items-center space-x-2">
                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                    Kirim ke WhatsApp
                </button>
                <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
