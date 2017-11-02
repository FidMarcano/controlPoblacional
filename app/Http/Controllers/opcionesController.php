<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Encuesta;
use DB;
use View;
use Auth;

class opcionesController extends Controller
{
    public function encuesta()
    {
    	$materiast = DB::table('materias')->get();
		$materias = Encuesta::formarEncuesta();   
		if (empty($materias)) {
			return view::make('home')->with(['n'=>2,'materias'=>$materias,'materiast'=>$materiast, 'o' => 0]);
		}else{
			return view::make('home')->with(['n'=>2,'materias'=>$materias,'materiast'=>$materiast, 'o' => 1]);
    	}
    }

    public function resultado()
    {
		$encuesta = DB::table('encuestas')->where('id_user', Auth::user()->id)->get();
    	$materias = DB::table('materias')->get();
    	$motivos = DB::table('motivos')->get();
    	$bloques = DB::table('bloques')->get();
		return view::make('home')->with(['n'=>6, 'materias'=>$materias, 'encuesta' => $encuesta, 'motivos' => $motivos, 'bloques'=> $bloques]);		
    }

    public function administracion()
    {
        return view::make('home')->with(['n'=>7]);     
    }
}
