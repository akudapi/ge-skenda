<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $poin = Poin::with('jurusan')->get();
        return view('admin.admin', compact('poin'));
    }

    public function update(Request $request, $id)
    {
        $poin = Poin::find($id);
        $poin->poin = $request->poin;
        $poin->save();
        return redirect()->route('admin')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Poin::destroy($id);
        return redirect()->route('admin')->with('success', 'Data berhasil dihapus');
    }
}