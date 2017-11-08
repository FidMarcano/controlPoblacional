<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\User;
use DB;
use View;
use Auth;

class encuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materias = DB::table('materias')->get();
        $total = 0;

        foreach ($request->materia as $m) {
            $materia = DB::table('materias')->where('id',$m)->first();
            $total = $total + $materia->uc;
        }

        //validar que no sean más de 21 UC
        if ($total > 21) {
            $materiast = DB::table('materias')->get();
            $materias = Encuesta::formarEncuesta();   
            return view::make('home')->with(['n'=>2,'materias'=>$materias,'materiast'=>$materiast]);
        }

        return view::make('home')->with(['n'=>3, 'materias' => $materias, 'elegidas' => $request->materia]);
    }

   

    public function create(Request $request)
    {
        if (isset($request->confirmar)) {
            $materias = DB::table('materias')->get();
            $bloques = DB::table('bloques')->get();
            $motivos = DB::table('motivos')->get();

            foreach ($request->materia as $m) {
                Encuesta::store($m, 0, 0);
            }

            $materia1 = DB::table('encuestas')->where([
                ['id_user',Auth::user()->id],
                ['id_motivo',0],
                ['id_bloque',0]
            ])->first();

            return view::make('home')->with(['n'=>4,'bloques'=>$bloques, 'motivos'=>$motivos, 'materias' => $materias, 'materia'=>$materia1]);
        }
        if (isset($request->cancelar)) {
            $materiast = DB::table('materias')->get();
            $materias = Encuesta::formarEncuesta();   
            if (empty($materias)) {
                return view::make('home')->with(['n'=>2,'materias'=>$materias,'materiast'=>$materiast, 'o' => 0]);
            }else{
                return view::make('home')->with(['n'=>2,'materias'=>$materias,'materiast'=>$materiast, 'o' => 1]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Encuesta::guardar($request->idMateria, $request->bloque, $request->motivo);   
            
        if ($request->bloque == 0 || $request->motivo == 0) {
            # code...
        }

        $materia1 = DB::table('encuestas')->where([
                ['id_user',Auth::user()->id],
                ['id_motivo',0],
                ['id_bloque',0]
            ])->first();

            
        if (empty($materia1)){
            User::encuestaRealizada();
            return view::make('home')->with(['n'=>5]);
        }else{
            $materias = DB::table('materias')->get();
            $bloques = DB::table('bloques')->get();
            $motivos = DB::table('motivos')->get();
            return view::make('home')->with(['n'=>4,'bloques'=>$bloques, 'motivos'=>$motivos, 'materias' => $materias, 'materia'=>$materia1]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
