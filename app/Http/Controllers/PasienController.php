<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('backend.pasien.index', compact('pasiens'));
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

        $pasien = new Pasien();
        $pasien->nama_pasien = $data['nama_pasien'];
        $pasien->jk = $data['jk'];
        $pasien->tgl_lahir = $data['tgl_lahir'];
        $pasien->alamat = $data['alamat'];
        $pasien->no_hp = $data['no_hp'];

        $pasien->save();

        return redirect()->route('pasien.index')->with('alert', 'Successfully add !');
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
        $pasiens = Pasien::find($id);

        return view('backend.pasien.edit', compact('pasiens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pasiens = Pasien::find($id);

        $data = $request->validate([
            'nama_pasien' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pasiens->update($data);

        return redirect()->route('pasien.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::find($id);
        
        $pasien->delete();
        
        return redirect()->route('pasien.index')->with('alert', 'Successfully drop !');
    }
}
