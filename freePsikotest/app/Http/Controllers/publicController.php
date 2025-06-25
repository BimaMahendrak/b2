<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Feedback;
use App\Models\Kategori;
use Illuminate\Http\Request;

class publicController extends Controller
{
    public function addBiodata(Request $request)
    {
        session()->forget('id_responden');
        $validated = $request->validate([
            'namaLengkap'   => 'required|string',
            'jenisKelamin'  => 'required|string',
            'tanggalLahir'  => 'required|date',
            'email'         => 'required|email',
        ]);

        
        $responden = Responden::updateOrCreate(
            ['email' => $validated['email']], // email unik
            [
                'nama_lengkap'           => $validated['namaLengkap'],
                'jenis_kelamin'          => $validated['jenisKelamin'],
                'tempat_tanggal_lahir'   => $validated['tanggalLahir'],
                'tanggal_ujian'          => now(), 
            ]
        );

        
        session(['id_responden' => $responden->id_responden]);

        return redirect()->route('tes');
    }

    public function showTes($no = 1)
    {
        $id_responden = session('id_responden');
        $responden = Responden::find($id_responden);

        // jumlah jawaban yang sudah diisi user
        $jumlahJawaban = Jawaban::where('id_responden', $id_responden)->count();

        if ($no > $jumlahJawaban + 1) {
            return redirect()->route('tes', ['no' => $jumlahJawaban + 1]);
        }
        if ($no <= $jumlahJawaban) {
            return redirect()->route('tes', ['no' => $jumlahJawaban + 1]);
        }

        // --- Pindahkan inisialisasi $pertanyaan ke sini ---
        $pertanyaan = Pertanyaan::orderBy('id_pertanyaan')->skip($no - 1)->first();
        $total = Pertanyaan::count();

        // --- Baru lakukan pengecekan $pertanyaan ---
        if (!$pertanyaan) {
            return redirect()->route('feedback');
        }

        return view('public.tes', [
            'pertanyaan' => $pertanyaan,
            'no' => $no,
            'total' => $total,
            'waktu_mulai' => $responden->tanggal_ujian,
            'now' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function addTes(Request $request, $no)
    {
        $request->validate([
            'pilihan' => 'required|integer',
        ]);

        $id_responden = session('id_responden');
        $responden = Responden::find($id_responden);

        // CEK WAKTU: Jika sudah lebih dari 20 menit, langsung redirect ke feedback
        $waktu_mulai = \Carbon\Carbon::parse($responden->tanggal_ujian);
        $waktu_sekarang = now();
        if ($waktu_sekarang->diffInSeconds($waktu_mulai) > 20 * 60) {
            return redirect()->route('feedback');
        }

        $pertanyaan = Pertanyaan::orderBy('id_pertanyaan')->skip($no - 1)->first();

        // Jawaban langsung disimpan ke database setiap submit
        Jawaban::create([
            'id_pertanyaan' => $pertanyaan->id_pertanyaan,
            'id_responden' => $id_responden,
            'jawaban' => $request->pilihan
        ]);

        // lanjut ke soal berikutnya
        return redirect()->route('tes', ['no' => $no + 1]);
    }

    public function addFeedback(Request $request)
    {
        $validated = $request->validate([
            'likert' => 'required|in:1,2,3,4,5',
            'kritik' => 'required|string|max:1000',
        ]);

        $id_responden = session('id_responden');

        Feedback::create([
            'id_responden' => $id_responden,
            'rating' => $validated['likert'],
            'ulasan' => $validated['kritik'],
        ]);

        return redirect()->route('hasil');
    }

    public function hasil()
    {
        $id_responden = session('id_responden');
        if (!$id_responden) {
            return redirect()->route('home')->with('error', 'Anda belum mengisi biodata.');
        }
        
        $jawaban = Jawaban::where('id_responden', $id_responden)->get();

        
        $kategori = Kategori::all();

        // total nilai per kategori
        $nilai = [];
        foreach ($kategori as $kat) {
            $nilai[$kat->nama_kategori] = $jawaban
                ->where('pertanyaan.id_kategori', $kat->id_kategori)
                ->sum(function($j) { return (int)$j->jawaban; });
        }

        // Artinya lek
        $hasil = [];
        foreach ($nilai as $nama => $total) {
            if ($nama == 'Depression') {
                if ($total > 28) $status = 'Extremely Serve';
                elseif ($total > 21) $status = 'Serve';
                elseif ($total > 14) $status = 'Moderate';
                elseif ($total > 10) $status = 'Mild';
                else $status = 'Normal';
            } elseif ($nama == 'Anxiety') {
                if ($total > 20) $status = 'Extremely Serve';
                elseif ($total > 15) $status = 'Serve';
                elseif ($total > 10) $status = 'Moderate';
                elseif ($total > 8) $status = 'Mild';
                else $status = 'Normal';
            } elseif ($nama == 'Stress') {
                if ($total > 34) $status = 'Extremely Serve';
                elseif ($total > 26) $status = 'Serve';
                elseif ($total > 19) $status = 'Moderate';
                elseif ($total > 15) $status = 'Mild';
                else $status = 'Normal';
            } else {
                $status = '-';
            }
            $hasil[$nama] = [
                'total' => $total,
                'status' => $status,
            ];
        }

        // Hapus semua session setelah hasil ditampilkan
        session()->flush();

        return view('public.hasil', compact('hasil'));
    }
}