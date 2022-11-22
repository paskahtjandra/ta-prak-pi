<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = "nim";
    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'password',
        'prodiId',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodiId');
    }


    public function matakuliahs()
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah', 'mhsNim', 'mkId');
    }
}
