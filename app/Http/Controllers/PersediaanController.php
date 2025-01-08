<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use Illuminate\Http\Request;
use App\Imports\PersediaanImport;
use Maatwebsite\Excel\Facades\Excel;

class PersediaanController extends Controller
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
        $jenis = $request->jenis;
        $pesan = ucfirst($jenis) . " berhasil ditambahkan";
        Persediaan::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
            'jenis' => $jenis,
        ]);

        return redirect()->back()->with('success', $pesan);
    }

    public function import(Request $request)
    {
        Excel::import(new PersediaanImport, $request->file('file'));
        return back()->with('success', 'Data berhasil diimpor!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persediaan $persediaan, $id)
    {
        $persediaan = Persediaan::where('id', $id)->first();
        return response()->json($persediaan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persediaan $persediaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persediaan $persediaan, $id)
    {
        $jenis = $request->jenis;
        $pesan = ucfirst($jenis) . " berhasil ditambahkan";

        Persediaan::where('id', $id)->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
            'jenis' => $jenis,
        ]);

        return redirect()->back()->with('success', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Persediaan $persediaan, $id)
    {
        $jenis = $request->jenis;
        $pesan = ucfirst($jenis) . " berhasil dihapus";
        Persediaan::where('id', $id)->delete();
        return redirect()->back()->with('success', $pesan);
    }
}
