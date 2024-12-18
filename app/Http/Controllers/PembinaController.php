<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembina;
use App\Http\Controllers\PembinaController;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pembina = Pembina::paginate(10);
        return view('pembina.index', ['pembina' => $pembina]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembina.create');
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
            'nama_pembina' => ['required', 'string', 'max:255'],
            ]);
            $data = $request->all();
            Pembina::create($data);
            return redirect('/pembina');
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
        return view('pembina.edit', ['pembina' => Pembina::find($id)]);
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
        $request->validate([
            'nama_pembina' => ['required', 'string', 'max:255'],
            ]);
            $data = $request->all();
            
            $pembina = Pembina::find($id);
            $pembina->update($data);
            return redirect('/pembina');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembina = Pembina::find($id);
    $pembina->delete();
    return redirect('/pembina');
    }
}
