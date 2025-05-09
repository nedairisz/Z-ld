<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzesek;
use Illuminate\Http\Request;

class BejegyzesekController extends Controller
{
    public function index(){
        $bejegyzesek = Bejegyzesek::with('tevekenyseg:tevekenyseg_nev,pontszam')->get();
        return response()->json($bejegyzesek);
    }

    public function osztalySzerint($osztaly_nev){
        $bejegyzesek = Bejegyzesek::with('tevekenyseg')->where('osztaly_nev', $osztaly_nev)->get();
        return response()->json($bejegyzesek);
    }

    public function ujBejegyzes(Request $request)  {
        $bejegyzes = Bejegyzesek::create([
            'tevekenyseg_id' => $request->tevekenyseg_id,
            'osztaly_nev' => $request->osztaly_nev,
        ]);
        return response()->json($bejegyzes);
    }

    

}
