<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugass = Petugas::all();
        $jabatan = Jabatan::all();

        return view('backend.petugas.index', compact('petugass', 'jabatan'));
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
        $petugas = new Petugas;
        
        $petugas->nama_petugas = $request->input('nama_petugas');
        $petugas->jabatan = $request->input('jabatan');
        $petugas->jk = $request->input('jk');
        $petugas->no_hp = $request->input('no_hp');
        $petugas->username = $request->input('username');
        $petugas->password = Hash::make($request['password']);

        $petugas->save();

        return redirect()->route('petugas.index')->with('alert', 'Successfully add !');
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
        $petugass = Petugas::find($id);
        $jabatan = Jabatan::all();

        return view('backend.petugas.edit', compact('petugass', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = Petugas::find($id);

        $nama_petugas = $request->input('nama_petugas');
        $jabatan = $request->input('jabatan');
        $jk = $request->input('jk');
        $no_hp = $request->input('no_hp');
        $username = $request->input('username');
        $password = Hash::make($request['password']);

        $data = [
            'nama_petugas' => $nama_petugas,
            'jabatan' => $jabatan,
            'jk' => $jk,
            'no_hp' => $no_hp,
            'username' => $username,
            'password' => $password,
        ];

        $petugas->update($data);

        return redirect()->route('petugas.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Petugas::find($id);
        
        $petugas->delete();
        
        return redirect()->route('petugas.index')->with('alert', 'Successfully drop !');
    }
}
