<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use App\Models\Persediaan;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepoController extends Controller
{
    protected $persediaans;
    protected $laboratoriums;

    public function __construct(Request $request)
    {
        $jenis = $request->segment(2);
        $this->persediaans = Persediaan::where('jenis', $jenis)->get();
        $this->laboratoriums = Laboratorium::all();
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
        return view('auth.pages.alat', compact('persediaans', 'laboratoriums'));
    }
    public function cair()
    {
        $persediaans = $this->persediaans;
        $laboratoriums = $this->laboratoriums;
        return view('auth.pages.cair', compact('persediaans', 'laboratoriums'));
    }
    public function padat()
    {
        $persediaans = $this->persediaans;
        $laboratoriums = $this->laboratoriums;
        return view('auth.pages.padat', compact('persediaans', 'laboratoriums'));
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
    public function laboratorium()
    {
        $laboratoriums = Laboratorium::all();
        return view('auth.pages.laboratorium', compact('laboratoriums'));
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
