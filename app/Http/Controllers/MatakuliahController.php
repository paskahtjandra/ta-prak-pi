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

    public function getMatakuliah()
    {
        $matakuliah = Matakuliah::All();

        return response()->json([
            'success' => true,
            'message' => 'All Matakuliah Grabbed',
            'matakuliah' => $matakuliah
        ]);
    }
}
