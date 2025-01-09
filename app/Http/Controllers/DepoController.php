<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Satuan;
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
        return view('auth.depo');
    }

    public function alat()
    {
        $persediaans = $this->persediaans;
        $laboratoriums = $this->laboratoriums;
        $satuans = $this->satuans->where('jenis', 'alat');
        return view('auth.pages.alat', compact('persediaans', 'laboratoriums', 'satuans'));
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
