<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bejegyzesek extends Model
{
    /** @use HasFactory<\Database\Factories\BejegyzesekFactory> */
    use HasFactory;
    protected $fillable = [
        'tevekenyseg_id',
        'osztaly_nev',
    ];

    
    public function tevekenyseg()
    {
        return $this->belongsTo(Tevekenyseg::class, 'tevekenyseg_id', 'tevekenyseg_id');
    }
}
