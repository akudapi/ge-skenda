<?php

namespace App\Http\Controllers;

use App\Models\Peringkat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data = Peringkat::orderBy('point', 'desc')->get();
        $lastUpdate = Peringkat::max('updated_at');

        $lastUpdate = $lastUpdate ? Carbon::parse($lastUpdate) : null;
        
        return view('index', ['data' => $data, 'lastUpdate' => $lastUpdate]);

    }

    public function pilah(){

        return view('detail.pilah');

    }

    public function beasiswa(){

        return view('detail.beasiswa');

    }

    public function minyak(){

        return view('detail.minyak');

    }

    public function pot(){

        return view('detail.pot');

    }
}
