<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
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
    public function createMatakuliah(Request $request)
    {
        $matakuliah = Matakuliah::create([
            'nama' => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New matakuliah created',
            'data' => [
                'tag' => $matakuliah
            ]
        ]);
    }
}