<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{
    public function addBiodata(Request $request)
    {
        $validated = $request->validate([
            'namaLengkap'   => 'required|string',
            'jenisKelamin'  => 'required|string',
            'tanggalLahir'  => 'required|date',
            'email'         => 'required|email',
            'tanggalUji'    => 'required|date',
        ]);

        return redirect()->route('tes');
    }

    public function addTes(Request $request)
    {
        $validated = $request->validate([
            'pilihan'   => 'required|integer',
        ]);

        return redirect()->route('feedback');
    }

    public function addFeedback(Request $request)
    {
        $validated = $request->validate([
            'likert' => 'required|in:1,2,3,4,5',
            'kritik' => 'nullable|string|max:1000',
        ]);

        return redirect()->route('hasil');
    }
}