<?php

namespace App\Http\Controllers;

use App\Models\ConsolidadoDiarioVen;
use Illuminate\Http\Request;

class ConsolidadoDiarioVenController extends Controller
{
    public function getConsolidadoDiarioVen(Request $request){
        $query = ConsolidadoDiarioVen::with('marca:marc_codi,marc_descc');
        return response()->json($query->paginate(400));
    }
}
