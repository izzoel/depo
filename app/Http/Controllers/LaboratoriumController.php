<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorium = Laboratorium::all();
        return response()->json($laboratorium);
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
        Laboratorium::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Laboratorium berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratorium $laboratorium, $id)
    {
        $laboratorium = Laboratorium::where('id', $id)->first();
        return response()->json($laboratorium);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratorium $laboratorium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratorium $laboratorium, $id)
    {
        Laboratorium::where('id', $id)->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Laboratorium berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratorium $laboratorium, $id)
    {
        Laboratorium::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Laboratorium berhasil dihapus');
    }
}
