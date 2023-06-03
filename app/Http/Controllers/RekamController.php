<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Rekam;
use App\Models\User;
use Illuminate\Http\Request;

class RekamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekams = Rekam::all();
        $pasien = Pasien::all();
        $dokter = User::all();

        return view('backend.rekam.index', compact('rekams', 'pasien', 'dokter'));
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

        $rekam = new Rekam;
        $rekam->nama_pasien = $data['nama_pasien'];
        $rekam->keluhan = $data['keluhan'];
        $rekam->tgl = $data['tgl'];
        $rekam->nama_dokter = $data['nama_dokter'];

        $rekam->save();

        return redirect()->route('rekam.index')->with('alert', 'Successfully add !');
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
        $rekams = Rekam::find($id);
        $pasien = Pasien::all();
        $dokter = User::all();

        return view('backend.rekam.edit', compact('rekams', 'pasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rekams = Rekam::find($id);

        $nama_pasien = $request->input('nama_pasien');
        $keluhan = $request->input('keluhan');
        $tgl = $request->input('tgl');
        $nama_dokter = $request->input('nama_dokter');

        $data = [
            'nama_pasien' => $nama_pasien,
            'keluhan' => $keluhan,
            'tgl' => $tgl,
            'nama_dokter' => $nama_dokter,
        ];

        $rekams->update($data);

        return redirect()->route('rekam.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rekam = Rekam::find($id);
        
        $rekam->delete();
        
        return redirect()->route('rekam.index')->with('alert', 'Successfully drop !');
    }
}
