<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\JsonResponse;

class MarcaController extends Controller
{


    public function getData(): JsonResponse
    {
        $data = Marca::all();
        return response()->json($data);
    }

    public function index()
    {
        return view('marcas');
    }
}
