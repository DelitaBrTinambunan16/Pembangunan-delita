{{-- copy file ini dan include di layout utama (layouts.app) --}}
@php
    // default phone (tanpa +). Ganti atau ambil dari config/env.
    $waPhone = config('services.whatsapp.phone', '6282387398764');
    $defaultText = "Halo Admin, saya butuh bantuan mengenai dashboard."; // teks default kalau mau lewat langsung wa.me
@endphp

<!-- Floating WA button -->
<a href="{{ route('wa.compose') }}"
   title="Hubungi Admin via WhatsApp"
   class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 rounded-full shadow-lg bg-green-500 hover:bg-green-600 text-white"
   style="box-shadow: 0 6px 18px rgba(10, 255, 31, 0.15);">
    <!-- icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
        <path d="M20.52 3.48A11.84 11.84 0 0 0 12 0C5.373 0 0 5.373 0 12a11.92 11.92 0 0 0 1.66 6.02L0 24l6.2-1.64A11.92 11.92 0 0 0 12 24c6.627 0 12-5.373 12-12a11.84 11.84 0 0 0-3.48-8.52ZM12 22a9.93 9.93 0 0 1-5.11-1.4l-.37-.22-3.67.97.98-3.58-.24-.37A9.93 9.93 0 0 1 2 12C2 6.477 6.477 2 12 2c2.65 0 5.16 1.03 7.07 2.93A9.93 9.93 0 0 1 22 12c0 5.523-4.477 10-10 10Zm5.26-7.69c-.29-.15-1.72-.85-1.99-.95-.27-.1-.46-.15-.66.15s-.76.95-.93 1.15-.34.23-.63.08a8.09 8.09 0 0 1-2.38-1.47 8.98 8.98 0 0 1-1.66-2.08c-.17-.3-.02-.46.13-.61.14-.14.3-.34.45-.51.15-.17.2-.29.3-.48.1-.19.05-.35-.02-.5-.07-.15-.66-1.59-.9-2.17-.24-.57-.48-.49-.66-.5h-.56c-.19 0-.5.07-.76.35s-1 1-1 2.43 1.03 2.82 1.18 3.02c.15.2 2.03 3.1 4.93 4.34.69.3 1.23.47 1.65.6.69.22 1.32.19 1.82.12.55-.08 1.72-.7 1.96-1.38.24-.67.24-1.25.17-1.38-.07-.13-.26-.2-.55-.35Z"/>
    </svg>
</a>
