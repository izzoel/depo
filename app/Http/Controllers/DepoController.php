<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use App\Models\Persediaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepoController extends Controller
{
    protected $persediaans;

    public function __construct(Request $request)
    {
        $jenis = $request->segment(2);
        $this->persediaans = Persediaan::where('jenis', $jenis)->get();
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
        return view('auth.pages.alat', ['persediaans' => $this->persediaans]);
    }
    public function cair()
    {
        return view('auth.pages.cair', ['persediaans' => $this->persediaans]);
    }
    public function padat()
    {
        return view('auth.pages.padat', ['persediaans' => $this->persediaans]);
    }
    public function kerusakan()
    {
        $kerusakans = Kerusakan::all();
        return view('auth.pages.kerusakan', compact('kerusakans'));
    }
    public function mahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        return view('auth.pages.mahasiswa', compact('mahasiswas'));
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
