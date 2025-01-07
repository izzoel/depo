<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.depo');
    }

    public function alat()
    {
        return view('auth.pages.alat');
    }
    public function cair()
    {
        return view('auth.pages.cair');
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
    public function padat()
    {
        return view('auth.pages.padat');
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
