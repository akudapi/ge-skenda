<?php

namespace App\Http\Controllers;

use App\Models\Peringkat;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class PeringkatController extends Controller
{
    public function point_proses(Request $request){

        $validatedData = $request->validate([
            'jurusan'   => 'required|not_in:#',
            'point'     => 'required|integer|min:1',
        ]);

        $jurusan = Peringkat::where('id', $request->jurusan)->first();

        $jurusan->point += $request->point;
        $jurusan->save();
        // dd($request->all());
        
        return redirect()->back();

    }
}
