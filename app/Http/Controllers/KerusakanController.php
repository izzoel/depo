<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        Kerusakan::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerusakan $kerusakan, $id)
    {
        $kerusakan = Kerusakan::where('id', $id)->first();
        return response()->json($kerusakan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerusakan $kerusakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerusakan $kerusakan, $id)
    {
        Kerusakan::where('id', $id)->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
            'jenis' => $request->jenis,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerusakan $kerusakan, $id)
    {
        Kerusakan::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus');
    }
}
