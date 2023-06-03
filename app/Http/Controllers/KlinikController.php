<?php

namespace App\Http\Controllers;

use App\Models\klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kliniks = klinik::all(); 
        return view('backend.klinik.index', compact('kliniks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $klinik = new klinik();
        $klinik->nama_klinik = $data['nama_klinik'];

        $klinik->save();

        return redirect()->route('klinik.index')->with('alert', 'Successfully add !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kliniks = klinik::find($id);

        return view('backend.klinik.edit', compact('kliniks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kliniks = klinik::find($id);

        $data = $request->validate([
            'nama_klinik' => 'required'
        ]);

        $kliniks->update($data);

        return redirect()->route('klinik.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $klinik = Klinik::find($id);
        
        $klinik->delete();
        
        return redirect()->route('klinik.index')->with('alert', 'Successfully drop !');
    }
}
