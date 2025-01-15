<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Persediaan;
use Illuminate\Http\Request;
use App\Imports\PersediaanImport;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
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
        if ($jenis == 'alat') {
            $pesan = ucfirst($jenis) . " berhasil ditambahkan";
        } else {
            $pesan = "Bahan " . ucfirst($jenis) . " berhasil ditambahkan";
        }
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
        if ($jenis == 'alat') {
            $pesan = ucfirst($jenis) . " berhasil ditambahkan";
        } else {
            $pesan = "Bahan " . ucfirst($jenis) . " berhasil ditambahkan";
        }

        Persediaan::where('id', $id)->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
            'jenis' => $jenis,
        ]);

        return redirect()->back()->with('success', $pesan);
    }
    public function ambil(Request $request, Persediaan $persediaan, $id)
    {
        $persediaan = Persediaan::find($id);

        $pesan = ucfirst($persediaan->nama) . " berhasil diambil";
        $stok = $persediaan->stok - $request->ambil;

        $persediaan->update([
            'stok' => $stok
        ]);

        $riwayat = Riwayat::where('id_persediaan', $id)
            ->where('keperluan', session('keperluan'))
            ->whereDate('tanggal', '>=', now()->startOfDay())
            ->whereDate('tanggal', '<=', now()->endOfDay())
            ->get();

        if ($riwayat->isEmpty()) {
            Riwayat::create([
                'id_persediaan' => $id,
                'id_mahasiswa' => Auth::guard('mahasiswa')->user()->nim,
                'ambil' => $request->ambil,
                'tanggal' => now(),
                'keperluan' => session('keperluan')
            ]);
        } else {
            $update = [
                'ambil' => $riwayat->pluck('ambil')->first() + $request->ambil,
                'tanggal' => now()
            ];
            Riwayat::where('id_mahasiswa', Auth::guard('mahasiswa')->user()->nim)->where('id_persediaan', $id)
                ->where('keperluan', $riwayat->pluck('keperluan')->first())->update($update);
        }

        $notifikasi = Mahasiswa::find(Auth::guard('mahasiswa')->user()->nim);
        $notifikasi->update([
            'status' => $notifikasi->status + 1,
        ]);

        return redirect()->back()->with('success', $pesan);
    }
    public function kembali(Request $request, Persediaan $persediaan, $id)
    {
        $persediaan = Persediaan::find($id);

        $pesan = ucfirst($persediaan->nama) . " berhasil dikembalikan";
        $stok = $persediaan->stok + $request->kembali;
        $persediaan->update([
            'stok' => $stok
        ]);

        $riwayat = Riwayat::where('id_persediaan', $id)
            ->where('keperluan', session('keperluan'))
            ->whereDate('tanggal', '>=', now()->startOfDay())
            ->whereDate('tanggal', '<=', now()->endOfDay())
            ->get();

        if ($riwayat->isEmpty()) {
            Riwayat::create([
                'id_persediaan' => $id,
                'id_mahasiswa' => Auth::guard('mahasiswa')->user()->nim,
                'kembali' => $request->kembali,
                'tanggal' => now(),
                'keperluan' => session('keperluan')
            ]);
        } else {
            $update = [
                'kembali' => $riwayat->pluck('kembali')->first() + $request->kembali,
                'tanggal' => now()
            ];
            Riwayat::where('id_mahasiswa', Auth::guard('mahasiswa')->user()->nim)->where('id_persediaan', $id)
                ->where('keperluan', $riwayat->pluck('keperluan')->first())->update($update);
        }
        $notifikasi = Mahasiswa::find(Auth::guard('mahasiswa')->user()->nim);
        $notifikasi->update([
            'status' => $notifikasi->status + 1,
        ]);


        return redirect()->back()->with('success', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Persediaan $persediaan, $id)
    {
        $jenis = $request->jenis;
        if ($jenis == 'alat') {
            $pesan = ucfirst($jenis) . " berhasil dihapus";
        } else {
            $pesan = "Bahan " . ucfirst($jenis) . " berhasil dihapus";
        }
        Persediaan::where('id', $id)->delete();
        return redirect()->back()->with('success', $pesan);
    }
}
