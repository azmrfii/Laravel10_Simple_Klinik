<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('backend.jabatan.index', compact('jabatans'));
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

        $jabatan = new Jabatan();
        $jabatan->jabatan = $data['jabatan'];

        $jabatan->save();

        return redirect()->route('jabatan.index')->with('alert', 'Successfully add !');
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
        $jabatans = Jabatan::find($id);

        return view('backend.jabatan.edit', compact('jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jabatans = Jabatan::find($id);

        $data = $request->validate([
            'jabatan' => 'required'
        ]);

        $jabatans->update($data);

        return redirect()->route('jabatan.index')->with('alert', 'Successfully managed to change !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatan = Jabatan::find($id);

        $jabatan->petugas()->delete();
        
        return redirect()->route('jabatan.index')->with('alert', 'Successfully drop item !');
    }
}
