<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Kategori;

class dashboardController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'Barita' && $password === 'Bima') {
            session(['admin' => true]);
            return redirect()->route('dashboard')->with('successLogin', true);
        }

        return redirect()->back()->with('wrongLogin', true);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('successLogout', true);
    }
    public function soal()
    {
        $data = Pertanyaan::all();
        return view('dashboard.soal', compact('data'));
    }
    public function respon()
    {
        $data = Responden::all();
        $kategori = Kategori::all();

        foreach ($data as $responden) {
            foreach ($kategori as $kat) {
                $nilai = Jawaban::where('id_responden', $responden->id_responden)
                    ->whereHas('pertanyaan', function ($q) use ($kat) {
                        $q->where('id_kategori', $kat->id_kategori);
                    })
                    ->sum('jawaban');
                $responden[$kat->nama_kategori] = $nilai;
            }
        }

        return view('dashboard.respon', compact('data'));
    }


    public function responDetail($id)
    {
        $responden = Responden::findOrFail($id);
        $jawaban = Jawaban::where('id_responden', $id)->orderBy('id_pertanyaan')->get();
        $kategori = Kategori::all();

        $hasil = [];
        foreach ($kategori as $kat) {
            $hasil[$kat->nama_kategori] = $jawaban
                ->where('pertanyaan.id_kategori', $kat->id_kategori)
                ->sum('jawaban');
        }

        return view('dashboard.responDetail', compact('responden', 'jawaban', 'hasil'));
    }

    public function index()
    {
        $jumlahSoal = Pertanyaan::count();
        $jumlahResponden = Responden::count();

        $kategori = Kategori::all();
        $rataRata = [];
        foreach ($kategori as $kat) {
            $jawaban = Jawaban::whereHas('pertanyaan', function ($q) use ($kat) {
                $q->where('id_kategori', $kat->id_kategori);
            })->avg('jawaban');
            $rataRata[] = round($jawaban ?? 0, 2);
        }

        return view('dashboard.index', compact('jumlahSoal', 'jumlahResponden', 'rataRata'));
    }
    public function soalAdd(Request $request)
    {
        $request->validate([
            'kategori' => 'required|integer',
            'pertanyaan' => 'required|string',
        ]);

        Pertanyaan::create([
            'id_kategori' => $request->kategori,
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->route('soal')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    public function soalEdit(Request $request)
    {
        $request->validate([
            'idPertanyaan' => 'required|integer',
            'kategori' => 'required|integer',
            'pertanyaan' => 'required|string',
        ]);

        $soal = Pertanyaan::findOrFail($request->idPertanyaan);
        $soal->update([
            'id_kategori' => $request->kategori,
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->route('soal')->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    public function soalDelete(Request $request)
    {
        $request->validate([
            'idPertanyaan' => 'required|integer',
        ]);

        $soal = Pertanyaan::findOrFail($request->idPertanyaan);
        $soal->delete();

        return redirect()->route('soal')->with('success', 'Pertanyaan berhasil dihapus!');
    }
    public function responDelete(Request $request)
    {
        $request->validate([
            'idPertanyaan' => 'required|integer',
        ]);

        $id = $request->idPertanyaan;

        Jawaban::where('id_responden', $id)->delete();
        Feedback::where('id_responden', $id)->delete();
        Responden::where('id_responden', $id)->delete();

        return redirect()->route('respon')->with('success', 'Respons berhasil dihapus!');
    }
}
