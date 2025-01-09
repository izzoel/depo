<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::all();
        return response()->json($satuan);
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
        Satuan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
        ]);

        return redirect()->back()->with('success', 'Satuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan, $id)
    {
        $satuan = Satuan::where('id', $id)->first();
        return response()->json($satuan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan, $id)
    {
        Satuan::where('id', $id)->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
        ]);

        return redirect()->back()->with('success', 'Satuan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan, $id)
    {
        Satuan::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Satuan berhasil dihapus');
    }
}
