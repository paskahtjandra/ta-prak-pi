<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function createMahasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'password' => $request->password,
            'prodiId' => $request->prodiId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New Mahasiswa created',
            'data' => [
                'mahasiswa' => $mahasiswa
            ]
        ]);
    }

    public function getMahasiswaById($nim)
    {

        $mahasiswa = Mahasiswa::with('matakuliahs')->find($nim);
        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa grabbed',
            'data' => [
                'mahasiswa' => $mahasiswa
            ]
        ]);
    }
    public function getMahasiswas()
    {
        $mahasiswas = Mahasiswa::all();

        return response()->json([
            'status' => 'Success',
            'message' => 'all mahasiswas grabbed',
            'data' => [
                'mahasiswas' => $mahasiswas,
            ]
        ], 200);
    }

    public function addMatakuliah($nim, $mkId)
    {

        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa->matakuliahs()->attach([$mkId]);
        return $mahasiswa;

        // $mahasiswa = Mahasiswa::find($request->nim);

        // $mahasiswa->matakuliahs()->attach($request->matakuliahId);

        return response()->json([
            'success' => true,
            'message' => 'matakuliah added to ur profile',
        ]);
    }
}
