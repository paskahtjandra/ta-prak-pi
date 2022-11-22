<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
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
    public function createProdi(Request $request)
    {
        $prodi = Prodi::create([
            'nama' => $request->nama,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New prodi created',
            'data' => [
                'prodi' => $prodi
            ]
        ]);
    }
    public function getProdi()
    {
        $prodis = Prodi::All();

        return response()->json([
            'success' => true,
            'message' => 'All Prodi Grabbed',
            'prodi' => $prodis
        ]);
    }
}
