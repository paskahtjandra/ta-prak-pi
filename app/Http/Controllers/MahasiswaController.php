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
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->firstorFail();
        if (is_null($mahasiswa)) {
            return response()->json('Data not found', 404);
        }
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

    public function addMatakuliah($nim, $matakuliahId)
    {
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->firstorFail();

        $mahasiswa->matakuliahs()->attach($matakuliahId);

        return response()->json([
            'success' => true,
            'message' => 'matakuliah added to ur profile',
        ]);
    }
}
