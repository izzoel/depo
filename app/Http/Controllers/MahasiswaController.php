<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


    public function profil(Request $request, $role, $id)
    {
        if ($role == 'admin') {
            $profiles = User::where('id', $id)->get();
        } else {
            $profiles = Mahasiswa::where('nim', $id)->get();
        }

        // return view('auth.pages.profil', compact('mahasiswas'));
        return view('auth.pages.profil', compact('profiles'));
    }

    public function password(Request $request, $role, $id)
    {
        if ($role == 'admin') {
            $id = Auth::guard()->user()->id;
            $admin = User::where('id', $id)->get();
            $password = $admin[0]->password;

            if (Hash::check($request->password_lama, $password)) {
                if ($request->password_baru == $request->password_konfirmasi) {
                    User::where('id', $id)->update([
                        'password' => Hash::make($request->password_baru)
                    ]);
                    return redirect()->back()->with('success', 'Password berhasil diperbarui!');
                } else {
                    return redirect()->back()->with('fail', 'Password tidak sama!');
                }
            } else {
                return redirect()->back()->with('fail', 'Password lama salah!');
            }
        } else {
            $nim = Auth::guard('mahasiswa')->user()->nim;

            $mahasiswas = Mahasiswa::where('nim', $nim)->get();
            $password = $mahasiswas[0]->password;

            if (Hash::check($request->password_lama, $password)) {
                if ($request->password_baru == $request->password_konfirmasi) {
                    Mahasiswa::where('nim', $nim)->update([
                        'password' => Hash::make($request->password_baru)
                    ]);
                    return redirect()->back()->with('success', 'Password berhasil diperbarui!');
                } else {
                    return redirect()->back()->with('fail', 'Password tidak sama!');
                }
            } else {
                return redirect()->back()->with('fail', 'Password lama salah!');
            }
        }
    }

    public function biodata(Request $request)
    {
        $nim = Auth::guard('mahasiswa')->user()->nim;

        Mahasiswa::where('nim', $nim)->update([
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
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
