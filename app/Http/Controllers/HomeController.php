<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Peringkat;
use App\Models\Poin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
    
        // Ambil daftar tahun dari database
        $years = Poin::selectRaw('YEAR(contributed_at) as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');
    
        // Ambil daftar bulan dari database dan konversi ke nama bulan
        $months = Poin::selectRaw('MONTH(contributed_at) as month')
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->pluck('month')
            ->mapWithKeys(function ($month) {
                return [$month => Carbon::createFromDate(null, $month, 1)->translatedFormat('F')];
            });
    
        // Ambil data jurusan dari database
        $jurusan = Jurusan::all(); // Ambil semua jurusan dari tabel jurusans
    
        // Jika bulan dan tahun diisi, tampilkan data yang sesuai dengan filter
        if ($month && $year) {
            $data = Poin::with('jurusan')
                ->whereMonth('contributed_at', $month)
                ->whereYear('contributed_at', $year)
                ->selectRaw('jurusans_id, SUM(poin) as total_poin')
                ->groupBy('jurusans_id')
                ->orderBy('total_poin', 'desc') // Order by total_poin descending
                ->get();
        } else {
            // Jika tidak diisi, tampilkan total poin keseluruhan per jurusan
            $data = Poin::with('jurusan')
                ->selectRaw('jurusans_id, SUM(poin) as total_poin')
                ->groupBy('jurusans_id')
                ->orderBy('total_poin', 'desc') // Order by total_poin descending
                ->get();
        }
    
        // Create a mapping of jurusan IDs to total points
        $poinMapping = [];
        foreach ($data as $poin) {
            $poinMapping[$poin->jurusans_id] = $poin->total_poin;
        }
    
        // Sort the jurusan by their corresponding total points
        $sortedJurusan = $jurusan->sortByDesc(function ($j) use ($poinMapping) {
            return $poinMapping[$j->id] ?? 0; // Return 0 if no points exist
        });
    
        // Ambil tanggal terakhir diperbarui dan konversi ke objek Carbon
        $lastUpdate = Poin::max('updated_at');
        $lastUpdate = $lastUpdate ? Carbon::parse($lastUpdate) : null;
    
        // Kirim data ke view
        return view('index', compact('data', 'jurusan', 'sortedJurusan', 'poinMapping', 'month', 'months', 'year', 'years', 'lastUpdate'));
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

    public function showPoinHistory()
    {
        $poin = Poin::with('jurusan')->get();
        return view('poin.history', compact('poin'));
    }

}

