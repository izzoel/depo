<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Satuan;
use App\Models\Riwayat;
use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use App\Models\Persediaan;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepoController extends Controller
{
    protected $laboratoriums;
    protected $lokasis;
    protected $persediaans;
    protected $satuans;

    public function __construct(Request $request)
    {
        $jenis = $request->segment(2);
        $this->persediaans = Persediaan::where('jenis', $jenis)->get();
        $this->laboratoriums = Laboratorium::all();
        $this->lokasis = Lokasi::all();
        $this->satuans = Satuan::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persediaans = Persediaan::all();
        $total_persediaan = $persediaans->count();

        $riwayats = Riwayat::all();

        $total_alat = $persediaans->where('jenis', 'alat')->count();
        $total_cair = $persediaans->where('jenis', 'cair')->count();
        $total_padat = $persediaans->where('jenis', 'padat')->count();

        $alat = $persediaans->where('jenis', 'alat')
            ->sortByDesc('stok')
            ->take(2)
            ->pluck('nama')
            ->toArray();
        $cair = $persediaans->where('jenis', 'cair')
            ->sortByDesc('stok')
            ->take(2)
            ->pluck('nama')
            ->toArray();
        $padat = $persediaans->where('jenis', 'padat')
            ->sortByDesc('stok')
            ->take(2)
            ->pluck('nama')
            ->toArray();
        $total_riwayat_ambil = $riwayats->filter(function ($item) {
            return !empty($item->ambil);
        })->count();
        $total_riwayat_kembali = $riwayats->filter(function ($item) {
            return !empty($item->kembali);
        })->count();

        $statistik = [
            'total_persediaan' => $total_persediaan,
            'total_alat' => $total_alat,
            'total_cair' => $total_cair,
            'total_padat' => $total_padat,
            'alat' => $alat,
            'cair' => $cair,
            'padat' => $padat,
            'total_riwayat_ambil' => $total_riwayat_ambil,
            'total_riwayat_kembali' => $total_riwayat_kembali
        ];

        return view('auth.pages.depo', compact('statistik'));
    }
    public function chart()
    {
        $persediaans = Persediaan::all();
        $total_persediaan = $persediaans->count();

        $riwayats = Riwayat::all();


        $total_alat = $persediaans->where('jenis', 'alat')->count();
        $total_cair = $persediaans->where('jenis', 'cair')->count();
        $total_padat = $persediaans->where('jenis', 'padat')->count();

        $alat = $persediaans->where('jenis', 'alat')
            ->sortByDesc('stok')
            ->take(2)
            ->pluck('nama')
            ->toArray();
        $cair = $persediaans->where('jenis', 'cair')
            ->sortByDesc('stok')
            ->take(2)
            ->pluck('nama')
            ->toArray();
        $padat = $persediaans->where('jenis', 'padat')
            ->sortByDesc('stok')
            ->take(2)
            ->pluck('nama')
            ->toArray();

        $total_riwayat_ambil = $riwayats->filter(function ($item) {
            return !empty($item->ambil);
        })->count();
        $total_riwayat_kembali = $riwayats->filter(function ($item) {
            return !empty($item->kembali);
        })->count();

        $statistik = [
            'total_persediaan' => $total_persediaan,
            'total_alat' => $total_alat,
            'total_cair' => $total_cair,
            'total_padat' => $total_padat,
            'alat' => $alat,
            'cair' => $cair,
            'padat' => $padat,
            'total_riwayat_ambil' => $total_riwayat_ambil,
            'total_riwayat_kembali' => $total_riwayat_kembali
        ];

        return response()->json($statistik);
    }

    public function alat()
    {
        $persediaans = $this->persediaans;
        $lokasis = $this->lokasis;
        $satuans = $this->satuans->where('jenis', 'alat');
        return view('auth.pages.alat', compact('persediaans', 'lokasis', 'satuans'));
    }
    public function cair()
    {
        $persediaans = $this->persediaans;
        $lokasis = $this->lokasis;
        $satuans = $this->satuans->where('jenis', 'cair');
        return view('auth.pages.cair', compact('persediaans', 'lokasis', 'satuans'));
    }
    public function padat()
    {
        $persediaans = $this->persediaans;
        $lokasis = $this->lokasis;
        $satuans = $this->satuans->where('jenis', 'padat');
        return view('auth.pages.padat', compact('persediaans', 'lokasis', 'satuans'));
    }

    public function riwayat()
    {
        if (Auth::guard()->check()) {
            $riwayats = Riwayat::all();
        } else {
            $riwayats = Riwayat::where('id_mahasiswa', Auth::guard('mahasiswa')->user()->nim)->get();
            $notifikasi = Mahasiswa::find(Auth::guard('mahasiswa')->user()->nim);
            $notifikasi->update([
                'status' => '0',
            ]);
        }

        return view('auth.pages.riwayat', compact('riwayats'));
    }

    public function kerusakan()
    {
        $kerusakans = Kerusakan::all();
        $laboratoriums = $this->laboratoriums;
        return view('auth.pages.kerusakan', compact('kerusakans', 'laboratoriums'));
    }
    public function mahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        return view('auth.pages.mahasiswa', compact('mahasiswas'));
    }
    public function lokasi()
    {
        $lokasis = Lokasi::all();
        return view('auth.pages.lokasi', compact('lokasis'));
    }
    public function laboratorium()
    {
        $laboratoriums = Laboratorium::all();
        return view('auth.pages.laboratorium', compact('laboratoriums'));
    }
    public function satuan()
    {
        $satuans = Satuan::all();
        return view('auth.pages.satuan', compact('satuans'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
