<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
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
        // $date = date('d/m/Y', strtotime(str_replace('/', '-', $request->tanggal_lahir)));
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'password' => Hash::make($request->nim),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelamin' => $request->kelamin,
            'prodi' => $request->prodi,
        ]);

        return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function import(Request $request)
    {
        Excel::import(new MahasiswaImport, $request->file('file'));
        return back()->with('success', 'Data berhasil diimpor!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        return response()->json($mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa, $nim)
    {
        Mahasiswa::where('nim', $nim)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelamin' => $request->kelamin,
            'prodi' => $request->prodi,
            'no_hp' => $request->hp,
            'alamat' => $request->alamat
        ]);

        return redirect()->back()->with('success', 'Mahasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa, $nim)
    {
        Mahasiswa::where('nim', $nim)->delete();

        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus');
    }
}
