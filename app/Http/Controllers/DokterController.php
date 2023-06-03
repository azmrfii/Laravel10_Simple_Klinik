<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = User::all();
        $klinik = klinik::all();

        return view('backend.dokter.index', compact('dokters', 'klinik'));
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
        $dokter = new User;
        
        $dokter->nama_dokter = $request->input('nama_dokter');
        $dokter->jk = $request->input('jk');
        $dokter->alamat = $request->input('alamat');
        $dokter->tgl_lahir = $request->input('tgl_lahir');
        $dokter->spesialis = $request->input('spesialis');
        $dokter->no_hp = $request->input('no_hp');
        $dokter->email = $request->input('email');
        $dokter->username = $request->input('username');
        $dokter->password = Hash::make($request['password']);
        $dokter->klinik = $request->input('klinik');

        $dokter->save();

        return redirect()->route('dokter.index')->with('alert', 'Successfully add !');
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
        $klinik = Klinik::all();
        $dokters = User::find($id);

        return view('backend.dokter.edit', compact('dokters', 'klinik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokter = User::find($id);

        $nama_dokter = $request->input('nama_dokter');
        $jk = $request->input('jk');
        $alamat = $request->input('alamat');
        $tgl_lahir = $request->input('tgl_lahir');
        $spesialis = $request->input('spesialis');
        $no_hp = $request->input('no_hp');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = Hash::make($request['password']);
        $klinik = $request->input('klinik');

        $data = [
            'nama_dokter' => $nama_dokter,
            'jk' => $jk,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'spesialis' => $spesialis,
            'no_hp' => $no_hp,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'klinik' => $klinik,
        ];

        $dokter->update($data);

        return redirect()->route('dokter.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = User::find($id);
        
        $dokter->delete();
        
        return redirect()->route('dokter.index')->with('alert', 'Successfully drop !');
    }
}
