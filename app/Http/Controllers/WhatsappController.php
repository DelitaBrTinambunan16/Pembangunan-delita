<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    // Tampilkan form compose pesan
    public function compose()
    {
        // Default phone bisa ambil dari .env, kalau tidak ada gunakan placeholder
        $phone = config('services.whatsapp.phone', '6282387398764'); // tanpa + dan tanpa spasi
        return view('wa.compose', compact('phone'));
    }

    // Proses form dan redirect ke wa.me
    public function send(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits_between:8,15', // expect digits only (no +)
            'message' => 'required|string|max:1000'
        ], [
            'phone.required' => 'Nomor WA wajib diisi (gunakan kode negara, misal 62812xxxx).',
            'phone.digits_between' => 'Format nomor tidak valid.',
            'message.required' => 'Pesan wajib diisi.'
        ]);

        $phone = $request->phone;
        // encode pesan untuk querystring
        $text = rawurlencode($request->message);

        // buat link wa.me
        $waLink = "https://wa.me/{$phone}?text={$text}";

        // redirect ke wa.me (buka di tab baru lebih baik, tapi redirect server-side akan membuka di tab yg sama)
        return redirect()->away($waLink);
    }
}
