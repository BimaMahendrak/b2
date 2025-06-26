<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responden;
use App\Models\Pertanyaan;

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
        return view('dashboard.respon', compact('data'));
    }

    public function responDetail()
    {
        $data = Responden::all();
        return view('dashboard.responDetail', compact('data'));
    }

}