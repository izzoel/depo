<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Alat;
use App\Models\Cair;
use App\Models\User;
use App\Models\Bahan;
use App\Models\Padat;
use App\Models\Lokasi;
use App\Models\Satuan;
use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use App\Imports\AlatSheet;
use App\Imports\CairSheet;
use App\Imports\FirstSheet;
use App\Imports\PadatSheet;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use App\Imports\BahanImports;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class BahanController extends Controller
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
    public function store(Request $request, $jenis)
    {
        $create = [
            'nama' => $request->input('nama'),
            'stok' => $request->input('stok'),
            'satuan' => $request->input('satuan'),
            'lokasi' => $request->input('lokasi'),
            'jenis' => $request->input('jenis'),
        ];

        if ($jenis == 'cair') {
            Cair::create($create);
        } elseif ($jenis == 'padat') {
            Padat::create($create);
        } elseif ($jenis == 'alat') {
            Alat::create($create);
        }

        return back();
    }

    public function import(Request $request, $jenis)
    {
        if ($jenis == 'cair') {
            Excel::import(new CairSheet, $request->file('excel'));
        } elseif ($jenis == 'padat') {
            Excel::import(new PadatSheet, $request->file('excel'));
        } elseif ($jenis == 'alat') {
            Excel::import(new AlatSheet, $request->file('excel'));
        }
        return back();
    }
    /**
     * Display the specified resource.
     */

    public function showCair()
    {
        $cairs = Cair::where('jenis', 'Cair')->get();
        return response()->json($cairs);
    }

    public function showPadat()
    {
        $padats = Bahan::where('jenis', 'Padat')->get();
        return response()->json($padats);
    }

    public function showAlat()
    {
        $alats = Alat::where('jenis', 'Alat')->get();
        return response()->json($alats);
    }

    public function showBahan(Request $request, $jenis)
    {
        $id = $request->query('id');

        if ($jenis == 'cair') {
            $bahan = Cair::find($id);
        } elseif ($jenis == 'padat') {
            $bahan = Padat::find($id);
        } elseif ($jenis == 'alat') {
            $bahan = Alat::find($id);
        }

        return response()->json($bahan);
    }

    public function showSetting(Request $request, $jenis)
    {
        $id = $request->query('id');

        if ($jenis == 'cair') {
            $bahan = Cair::find($id);
        } elseif ($jenis == 'padat') {
            $bahan = Padat::find($id);
        } elseif ($jenis == 'alat') {
            $bahan = Alat::find($id);
        }

        $satuan = Satuan::orderBy('satuan', 'asc')->get();
        $lokasi = Lokasi::orderBy('lokasi', 'asc')->get();

        return response()->json(['bahan' => $bahan, 'satuan' => $satuan, 'lokasi' => $lokasi]);
    }

    public function put(Request $request)
    {
        $id = $request->input('id');
        $setor = $request->input('setor');
        $jenis = $request->input('jenis');
        $tanggal = Carbon::now();

        if ($jenis == 'cair') {
            $bahan = Cair::find($id);
        } elseif ($jenis == 'padat') {
            $bahan = Padat::find($id);
        } elseif ($jenis == 'alat') {
            $bahan = Alat::find($id);
        }

        $nama = $bahan->nama;
        $stok = $bahan->stok;
        $lokasi = $bahan->lokasi;

        $model = [
            'stok' => $stok + $setor,
            'lokasi' => ($stok - $setor <= 0) ? '-' : $lokasi
        ];

        $history_tanggal = Transaksi::whereDate('tanggal', '>=', substr($tanggal, 0, 10) . ' 00:00:00')
            ->whereDate('tanggal', '<=', substr($tanggal, 0, 10) . ' 23:59:59')->where('nama', $nama)->where('keperluan', session('keperluan'))
            ->get();

        if ($history_tanggal->isEmpty()) {
            $create = [
                'nama' => $nama,
                'jenis' => ucfirst($jenis),
                'stok' => $stok,
                'jumlah_ambil' => 0,
                'jumlah_kembali' => $setor,
                'id_mahasiswa' => session('nim'),
                'tanggal' => $tanggal,
                'keperluan' => session('keperluan')
            ];

            Transaksi::create($create);
        } else {
            $history_setor = $history_tanggal->first()->jumlah_kembali;
            $update = [
                'jumlah_kembali' => $history_setor + $setor,
                'tanggal' => $tanggal
            ];

            Transaksi::where('nama', $history_tanggal->pluck('nama'))->where('keperluan', $history_tanggal->pluck('keperluan'))->update($update);
        }

        $bahan->update($model);
    }
    public function take(Request $request)
    {
        $id = $request->input('id');
        $ambil = $request->input('ambil');
        $jenis = $request->input('jenis');
        $tanggal = Carbon::now();

        if ($jenis == 'cair') {
            $bahan = Cair::find($id);
        } elseif ($jenis == 'padat') {
            $bahan = Padat::find($id);
        } elseif ($jenis == 'alat') {
            $bahan = Alat::find($id);
        }

        $nama = $bahan->nama;
        $stok = $bahan->stok;
        $lokasi = $bahan->lokasi;

        $model = [
            'stok' => max(0, $stok - $ambil),
            'lokasi' => ($stok - $ambil <= 0) ? '-' : $lokasi
        ];

        $history_tanggal = Transaksi::whereDate('tanggal', '>=', substr($tanggal, 0, 10) . ' 00:00:00')
            ->whereDate('tanggal', '<=', substr($tanggal, 0, 10) . ' 23:59:59')->where('nama', $nama)->where('keperluan', session('keperluan'))
            ->get();

        if ($history_tanggal->isEmpty()) {
            $create = [
                'nama' => $nama,
                'jenis' => ucfirst($jenis),
                'stok' => $stok,
                'jumlah_ambil' => $ambil,
                'jumlah_kembali' => 0,
                'id_mahasiswa' => session('nim'),
                'tanggal' => $tanggal,
                'keperluan' => session('keperluan')
            ];

            Transaksi::create($create);
        } else {
            $history_ambil = $history_tanggal->first()->jumlah_ambil;
            $update = [
                'jumlah_ambil' => $history_ambil + $ambil,
                'tanggal' => $tanggal
            ];
            Transaksi::where('nama', $history_tanggal->pluck('nama')->first())->where('keperluan', $history_tanggal->pluck('keperluan')->first())->update($update);
        }
        $bahan->update($model);
    }

    public function set(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('namaEdit');
        $stok = $request->input('stokEdit');
        $satuan = $request->input('satuanEdit');
        $lokasi = $request->input('lokasiEdit');
        $jenis = $request->input('jenis');

        if ($jenis == 'cair') {
            $bahan = Cair::find($id);
        } elseif ($jenis == 'padat') {
            $bahan = Padat::find($id);
        } elseif ($jenis == 'alat') {
            $bahan = Alat::find($id);
        }

        $model = [
            'nama' => $nama,
            'stok' => $stok,
            'satuan' => $satuan,
            'lokasi' => $lokasi
        ];

        $bahan->update($model);
    }

    public function getSetting(Request $request)
    {
        $id = $request->input('id');
        $set = $request->input('set');

        if ($set == 'satuan') {
            $setting = Satuan::find($id);
        } elseif ($set == 'lokasi') {
            $setting = Lokasi::find($id);
        } elseif ($set == 'laboratorium') {
            $setting = Laboratorium::find($id);
        }

        return response()->json($setting);
    }

    public function updateSetting(Request $request)
    {
        $id = $request->input('id');
        $set = $request->input('set');
        $edit = $request->input('edit');

        if ($set == 'satuan') {
            $setting = Satuan::find($id);
        } elseif ($set == 'lokasi') {
            $setting = Lokasi::find($id);
        } elseif ($set == 'laboratorium') {
            $setting = Laboratorium::find($id);
        }

        $model = [
            $set => $edit,
        ];

        $setting->update($model);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(bahan $bahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bahan $bahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, bahan $bahan)
    {
        $id = $request->input('id');
        $jenis = $request->input('jenis');

        if ($jenis == 'cair') {
            Cair::destroy($id);
        } elseif ($jenis == 'padat') {
            Padat::destroy($id);
        } elseif ($jenis == 'alat') {
            Alat::destroy($id);
        } elseif ($jenis == 'kerusakan') {
            Kerusakan::destroy($id);
        } elseif ($jenis == 'satuan') {
            Satuan::destroy($id);
        } elseif ($jenis == 'lokasi') {
            Lokasi::destroy($id);
        } elseif ($jenis == 'laboratorium') {
            Laboratorium::destroy($id);
        }

        Transaksi::destroy($id);
    }
}
