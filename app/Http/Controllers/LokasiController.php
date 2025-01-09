<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        return response()->json($lokasi);
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
        Lokasi::create([
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi, $id)
    {
        $lokasi = Lokasi::where('id', $id)->first();
        return response()->json($lokasi);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi, $id)
    {
        Lokasi::where('id', $id)->update([
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi, $id)
    {
        Lokasi::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Lokasi berhasil dihapus');
    }
}
