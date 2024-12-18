<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanggal_awal = $request->get('tanggal_awal', date('Y-m-1')); 
        $tanggal_akhir = $request->get('tanggal_akhir', date('Y-m-d')); 
        $status = $request->get('status', 'DAFTAR'); 
        $pendaftarans = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal) ->where('tanggal_pendaftaran', '<=', $tanggal_akhir) ->when(($status=='SEMUA' ? '' : $status),function($query, $status){ 
        return $query->where('status', $status); 
        }) ->paginate()->withQueryString(); 
        return view('pendaftaran.index', ['pendaftarans' => $pendaftarans,  
        'tanggal_awal' => $tanggal_awal 
        , 'tanggal_akhir' => $tanggal_akhir, 'status' => $status]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ekstrakulikulers = Ekstrakulikuler::get();
        return view('pendaftaran.create', ['ekstrakulikulers' => $ekstrakulikulers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas' => 'required',
            'ekstrakulikuler_id' => 'required|exists:ekstrakulikulers,id',
            ]);
            $data = $request->all();
            $data['status'] = 'DAFTAR';
            $data['tanggal_pendaftaran'] = Carbon::today();
            $data['user_id'] = Auth::user()->id;
            Pendaftaran::create($data);
            return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function terima($id) 
    { 
    $pendaftaran = Pendaftaran::find($id); 
    $pendaftaran->status = 'TERIMA'; 
    $pendaftaran->save(); 
    return redirect('/pendaftaran'); 
    }

    public function tolak($id) 
    {
        $pendaftaran = Pendaftaran::find($id); 
        $pendaftaran->status = 'TOLAK'; 
        $pendaftaran->save();
        return redirect('/pendaftaran'); 
    }
    
}
