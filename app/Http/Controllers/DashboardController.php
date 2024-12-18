<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){

        if(Auth::user()->role=='Murid'){
        $pendaftaran = Pendaftaran::whereRaw('user_id=?',
        [Auth::user()->id])->first();
        return view('dashboard.muridindex', ['pendaftaran' => $pendaftaran]);
        }else if(Auth::user()->role=='Sekolah'){
        $tanggal_awal = $request->get('tanggal_awal',
        Carbon::today()->startOfMonth());
        $tanggal_akhir = $request->get('tanggal_akhir',
        Carbon::today()->startOfMonth()->addMonths(1)->subDays(1));
        // DAFTAR TERIMA TOLAK
        $all_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
        ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
        ->count();
        $daftar_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
        ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
        ->where('status', 'DAFTAR')
        ->count();
        $terima_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
        ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
        ->where('status', 'TERIMA')
        ->count();
        $tolak_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
        ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
        ->where('status', 'TOLAK')
        ->count();
        $top3 = DB::select(
        DB::raw("SELECT p.nama_ekstrakulikuler,f.nama_pembina,d.jumlah FROM
        (SELECT ekstrakulikuler_id,COUNT(ekstrakulikuler_id) AS jumlah FROM pendaftarans
        WHERE tanggal_pendaftaran >= :tanggal_awal
        AND tanggal_pendaftaran <= :tanggal_akhir
        GROUP BY ekstrakulikuler_id
        ORDER BY COUNT(ekstrakulikuler_id) DESC
        LIMIT 0,3) d
        JOIN ekstrakulikulers p ON p.id=d.ekstrakulikuler_id
        JOIN pembinas f ON f.id=p.pembina_id
        ORDER BY d.jumlah DESC
        "),
        [
        'tanggal_awal' => $tanggal_awal,
        'tanggal_akhir' => $tanggal_akhir,
        ]);
        $bottom3 = DB::select(
        DB::raw("SELECT p.nama_ekstrakulikuler,f.nama_pembina,d.jumlah FROM
        (SELECT ekstrakulikuler_id,COUNT(ekstrakulikuler_id) AS jumlah FROM pendaftarans
        WHERE tanggal_pendaftaran >= :tanggal_awal
        AND tanggal_pendaftaran <= :tanggal_akhir
        GROUP BY ekstrakulikuler_id
        ORDER BY COUNT(ekstrakulikuler_id)
        
        LIMIT 0,3) d
        JOIN ekstrakulikulers p ON p.id=d.ekstrakulikuler_id
        JOIN pembinas f ON f.id=p.pembina_id
        ORDER BY d.jumlah
        "),
        [
        'tanggal_awal' => $tanggal_awal,
        'tanggal_akhir' => $tanggal_akhir,
        ]);
        return view('dashboard.sekolindex',
        [
        'all' => $all_count,
        'daftar' => $daftar_count,
        'terima' => $terima_count,
        'tolak' => $tolak_count,
        'top3' => $top3,
        'bottom3' => $bottom3,
        'tanggal_awal' => $tanggal_awal,
        'tanggal_akhir' => $tanggal_akhir,
        ]
        );
        }else{
        return redirect('/');
        }
        }
}
