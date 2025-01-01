<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    function landing()
    {
        return view('guest.landing');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
    }
    public function logbook(Request $request)
    {
        $credentials = $request->only('nim', 'password');
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
    }
}
