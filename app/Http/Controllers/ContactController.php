<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman form kontak.
     */
    public function showForm()
    {
        return view('public.contact');
    }

    /**
     * Tangani submit form kontak.
     */
    public function submit(Request $request)
    {
        // Validasi input form
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'nullable|email',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:5000',
        ]);

        // Simpan pesan ke database
        ContactMessage::create($data);

        // Redirect balik ke halaman kontak dengan notifikasi sukses
        return back()->with('ok', 'Pesan kamu sudah terkirim. Kami akan menghubungi secepatnya.');
    }
}
