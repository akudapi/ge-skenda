<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function peringkat()
    {
        $poin = Poin::with('jurusan')->get();
        return view('admin.poin', compact('poin'));
    }

    public function dana()
    {
        $dana = User::all();

        $totalDana = $dana->sum('dana');

        return view('admin.dana', compact('totalDana'));
    }

    public function updateDana(Request $request)
    {
        // Validasi input
        $request->validate([
            'dana' => 'required|numeric|min:0',
        ]);

        // Dapatkan user yang sedang login
        $user = auth()->user();

        // Update dana user
        $user->dana = $request->input('dana');
        $user->save();

        return redirect()->back()->with('success', 'Dana berhasil diupdate!');
    }

    public function update(Request $request, $id)
    {
        $poin = Poin::find($id);
        $poin->poin = $request->poin;
        $poin->save();
        return redirect()->route('admin.poin')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Poin::destroy($id);
        return redirect()->route('admin.poin')->with('success', 'Data berhasil dihapus');
    }
}