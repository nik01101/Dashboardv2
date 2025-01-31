<?php
namespace App\Http\Controllers;

use App\Models\ConsolidadoAvances;
use App\Models\ConsolidadoDiarioVen;
use App\Models\DetalleVentaMarcaMes;
use App\Models\stckmrca;
use App\Models\VentaPeriodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleVentaController extends Controller
{
    public function index()
    {
        return view('detalles.index');
    }


    public function getDetallesVenta(Request $request)
    {
        $query = DetalleVentaMarcaMes::with('marca');

        return response()->json($query->get());
    }

    public function vtaprdo()
    {
        return view('detalles.vtaprdo');
    }

    public function stckmrca()
    {
        return view('detalles.stckmrca');
    }

    public function getStock(Request $request)
    {
        $query = stckmrca::with('marca:marc_codi,marc_descl','familia:marc_codi,fami_codi,fami_descl')
        ->select('marc_codi','fami_codi','prod_codi','prod_desc','prod_unid','prod_cant','prod_costo','prod_stot');
        return response()->json($query->get());
    }

    public function getDetallesVtaprdo(Request $request){
        $query = VentaPeriodo::with('marca:marc_codi,marc_descl','familia:marc_codi,fami_codi,fami_descl')
            ->select('periodo','marc_codi','fami_codi','sum_valor','sum_costo','margen_soles');
        return response()->json($query->get());
    }

    public function getGraficoDiario(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // Si no hay fechas, usar últimos 15 días por defecto
        if (!$fechaInicio || !$fechaFin) {
            $fechaInicio = now()->subDays(15)->format('Y-m-d');
            $fechaFin = now()->format('Y-m-d');
        }

        $query = ConsolidadoDiarioVen::select(
            'fecha_em',
            DB::raw('SUM(sum_valor) as total_valor')
        )
            ->when($fechaInicio && $fechaFin, function ($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('fecha_em', [$fechaInicio, $fechaFin]);
            })
            ->groupBy('fecha_em')
            ->orderBy('fecha_em', 'asc') // Opcional, para que las fechas estén ordenadas
            ->get()
            ->map(function ($row) {
                $row->total_valor = round($row->total_valor, 2);
                return $row;
            });

        return response()->json($query);
    }

    public function GraficoEvolutivoDiario(Request $request){
        $query = ConsolidadoAvances::select(DB::raw('CAST (fecha_proc AS DATE) as fecha_proc'),DB::raw('SUM(margen_soles) as total_ganancia'))
        ->groupBy(DB::raw('CAST (fecha_proc AS DATE)'))
        ->orderBy('fecha_proc', 'desc')->limit(10)
        ->get();

        return response()->json($query);
    }

    public function  GraficoEvolutivoPeriodo(Request $request)
    {
        $query = DetalleVentaMarcaMes::select('periodo',DB::raw('SUM(margen_soles) as total_ganancia'))
        ->groupBy('periodo')
        ->orderBy('periodo', 'desc')
        ->get();
        return response()->json($query);
    }

}
