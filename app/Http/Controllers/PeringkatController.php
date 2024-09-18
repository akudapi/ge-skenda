<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class PeringkatController extends Controller
{
    public function point_proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'jurusan' => 'required|exists:jurusans,id',
            'point' => 'required|integer|min:0',
        ]);
    
        // Simpan data ke dalam database
        Poin::create([
            'jurusans_id' => $request->input('jurusan'),
            'poin' => $request->input('point'),
            'contributed_at' => now(),
        ]);
    
        // Redirect kembali
        return redirect()->route('index', '#peringkat');
    }
    
}
