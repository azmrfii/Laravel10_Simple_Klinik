<?php

namespace App\Http\Controllers;

use App\Models\klinik;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\User;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaans = Pemeriksaan::all();
        $klinik = klinik::all();
        $dokter = User::all();
        $pasien = Pasien::all();

        return view('backend.pemeriksaan.index', compact('pemeriksaans', 'klinik', 'pasien', 'dokter'));
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

        $pemeriksaan = new Pemeriksaan;
        $pemeriksaan->nama_pasien = $data['nama_pasien'];
        $pemeriksaan->klinik = $data['klinik'];
        $pemeriksaan->nama_dokter = $data['nama_dokter'];
        $pemeriksaan->tgl = $data['tgl'];
        $pemeriksaan->hasil_penguji = $data['hasil_penguji'];
        $pemeriksaan->biaya = $data['biaya'];

        $pemeriksaan->save();

        return redirect()->route('pemeriksaan.index')->with('alert', 'Successfully add !');
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
        $pemeriksaans = Pemeriksaan::find($id);
        $klinik = klinik::all();
        $dokter = User::all();
        $pasien = Pasien::all();

        return view('backend.pemeriksaan.edit', compact('pemeriksaans', 'klinik', 'pasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);

        $nama_pasien = $request->input('nama_pasien');
        $klinik = $request->input('klinik');
        $nama_dokter = $request->input('nama_dokter');
        $tgl = $request->input('tgl');
        $hasil_penguji = $request->input('hasil_penguji');
        $biaya = $request->input('biaya');
        
        $data = [
            'nama_pasien' => $nama_pasien,
            'klinik' => $klinik,
            'nama_dokter' => $nama_dokter,
            'tgl' => $tgl,
            'hasil_penguji' => $hasil_penguji,
            'biaya' => $biaya,
        ];

        $pemeriksaan->update($data);

        return redirect()->route('pemeriksaan.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        
        $pemeriksaan->delete();
        
        return redirect()->route('pemeriksaan.index')->with('alert', 'Successfully drop !');
    }
}
