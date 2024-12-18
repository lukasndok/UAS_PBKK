<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Pembina;
use Illuminate\Http\Request;
use App\Http\Controllers\EkstrakulikulerController;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekstrakulikulers = Ekstrakulikuler::paginate(10);
        return view('ekstrakulikuler.index', ['ekstrakulikulers' => $ekstrakulikulers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembina = pembina::get();
        return view('ekstrakulikuler.create', ['pembina' => $pembina]);
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
            'pembina_id' => ['required', 'exists:pembinas,id'],
            'nama_ekstrakulikuler' => ['required', 'string', 'max:255']
        ]);
        $data = $request->all();
        Ekstrakulikuler::create($data);
        return redirect('/ekstrakulikuler');
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
        {
            { 
                $ekstrakulikuler = Ekstrakulikuler::find($id); 
                $pembina = Pembina::all(); 
                return view('ekstrakulikuler.edit', compact('ekstrakulikuler', 'pembina')); 
            }
        }
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
        {
            $request->validate([ 
                'pembina_id' => ['required', 'exists:pembina_id'], 
                'nama_ekstrakulikuler' => ['required', 'string', 'max:255'], 
            ]); 
            $ekstrakulikuler = Ekstrakulikuler::findOrFail($id); 
            $ekstrakulikuler->pembina_id = $request->pembina_id; 
            $ekstrakulikuler->nama_ekstrakulikuler = $request->nama_ekstrakulikuler; 
            $ekstrakulikuler->save(); 
            return redirect('/ekstrakulikuler');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::find($id);
        $ekstrakulikuler->delete();
        return redirect('/ekstrakulikuler');
    }
}
