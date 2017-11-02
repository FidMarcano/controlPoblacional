<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PDF;
use DB;
use View;
use RPDF;

class PDFController extends Controller
{
    public function resultado()
    {
    	$resultados = DB::table('encuestas')->where('id_user',Auth::user()->id)->get();
    	$bloques = DB::table('bloques')->get();
    	$materias = DB::table('materias')->get();
    	$motivos = DB::table('motivos')->get();
    	
    	$pdf = RPDF::loadView('pdf.pdfresultados', ['resultados' => $resultados, 'motivos'=>$motivos,'materias'=>$materias,'bloques'=>$bloques]);
    	
    	return $pdf->download('resultados.pdf');

    }
}
