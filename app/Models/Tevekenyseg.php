<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tevekenyseg extends Model
{
    /** @use HasFactory<\Database\Factories\TevekenysegFactory> */
    use HasFactory;


    protected $primaryKey = 'tevekenyseg_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'tevekenyseg_nev',
        'pontszam',
    ];

    public function bejegyzesek()
    {
        return $this->hasMany(Bejegyzesek::class, 'tevekenyseg_id', 'tevekenyseg_id');
    }
}
