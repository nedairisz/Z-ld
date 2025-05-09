<?php

use App\Models\Tevekenyseg;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tevekenysegs', function (Blueprint $table) {
            $table->id('tevekenyseg_id');
            $table->string('tevekenyseg_nev');
            $table->integer('pontszam');
            $table->timestamps();
        });

        Tevekenyseg::insert([
        [
            'tevekenyseg_nev'=> 'Virágültetés',
            'pontszam' => 50,
        ],[
            'tevekenyseg_nev'=> 'Biciklizés',
            'pontszam' => 30,
        ],[
            'tevekenyseg_nev'=> 'Önkénteskedés',
            'pontszam' => 80,
        ]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tevekenysegs');
    }
};
