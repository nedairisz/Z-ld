<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzesek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BejegyzesekController extends Controller
{
    public function index()
    {
        $bejegyzesek = Bejegyzesek::with('tevekenyseg:tevekenyseg_id,tevekenyseg_nev,pontszam')->get()
            ->map(function ($bejegyzes) {
                return [
                    'id' => $bejegyzes->id,
                    'tevekenyseg_nev' => $bejegyzes->tevekenyseg->tevekenyseg_nev ?? null,
                    'pontszam' => $bejegyzes->tevekenyseg->pontszam ?? null,
                ];
            });
        return response()->json($bejegyzesek);
    }


    /* public function index()
        {
            $bejegyzesek = DB::select("
            SELECT 
                b.id,
                t.tevekenyseg_nev,
                t.pontszam
            FROM 
                bejegyzeseks b
            JOIN 
                tevekenysegs t ON b.tevekenyseg_id = t.tevekenyseg_id
        ");
        return response()->json($bejegyzesek);
    } */

    public function osztalySzerint($osztaly_nev)
    {
        $bejegyzesek = Bejegyzesek::with(['tevekenyseg','osztaly'])->where('osztaly_nev', $osztaly_nev)->get();
        return response()->json($bejegyzesek);
    }
    


    /* public function osztalySzerint($osztaly_nev)
        {
            $bejegyzesek = DB::select("
            SELECT 
                b.id,
                t.tevekenyseg_nev,
                t.pontszam
            FROM 
                bejegyzeseks b
            JOIN 
                tevekenysegs t ON b.tevekenyseg_id = t.tevekenyseg_id
            WHERE 
                b.osztaly_nev = ?
        ", [$osztaly_nev]);

        return response()->json($bejegyzesek);
    } */

    public function ujBejegyzes(Request $request)
    {
        $bejegyzes = Bejegyzesek::create([
            'tevekenyseg_id' => $request->tevekenyseg_id,
            'osztaly_nev' => $request->osztaly_nev,
        ]);
        return response()->json($bejegyzes);
    }


   /*  public function ujBejegyzes(Request $request)
        {
            DB::insert("
            INSERT INTO bejegyzeseks (tevekenyseg_id, osztaly_nev, created_at, updated_at)
            VALUES (?, ?, NOW(), NOW())
        ", [
                $request->tevekenyseg_id,
                $request->osztaly_nev
            ]);

        return response()->json(['message' => 'Sikeres beszúrás!'], 201);
    } */
}
