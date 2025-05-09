<?php

use App\Models\Bejegyzesek;
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
        Schema::create('bejegyzeseks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tevekenyseg_id')->references('tevekenyseg_id')->on('tevekenysegs');
            $table->string('osztaly_nev');
            $table->timestamps();
        });

        Bejegyzesek::insert([
            [
                'tevekenyseg_id'=>1,
                'osztaly_nev' => '10A',
            ],
            [
                'tevekenyseg_id'=>2,
                'osztaly_nev' => '7B',
            ],
            [
                'tevekenyseg_id'=>3,
                'osztaly_nev' => '11C',
            ],
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bejegyzeseks');
    }
};
