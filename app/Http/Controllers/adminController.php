<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;
use App\Admin;
use App\User;
use App\Estadistica;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class adminController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = DB::table('users')->orderBy('id', 'DESC')->paginate(10);
        $ciudades = DB::table('ciudades')->get();
        $aprobados = DB::table('aprobados')->get();
        $materias = DB::table('materias')->get();
        $encuestas = DB::table('encuestas')->get();
        $motivos = DB::table('motivos')->get();
        $bloques = DB::table('bloques')->get();
        $nuevos = Admin::Nuevos($usuarios);
        $noP = Admin::NoParticipantes($usuarios);
        
        //Entrando a la vista de usuarios----------------------------------------------------------------
        if (isset($request->usuarios)) {
           
            if (empty($encuestas)) {
                return view::make('home')->with(['n'=> 8, 'usuarios'=>$usuarios, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'nuevos'=>$nuevos, 'encuestas' => 0, 'motivos' => $motivos, 'noP' => $noP, 'bloques'=>$bloques ]);
            }else{
                return view::make('home')->with(['n'=> 8, 'usuarios'=>$usuarios, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'nuevos'=>$nuevos, 'encuestas' => $encuestas, 'motivos' => $motivos, 'noP' => $noP, 'bloques'=>$bloques]);
            }
            
            //Entrando a la vista de administración de resultados----------------------------------------
        }elseif (isset($request->resultados)) {
           
            return view::make('home')->with(['n'=> 9]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = DB::table('materias')->get();
        $encuestas = DB::table('encuestas')->get();
        $motivos = DB::table('motivos')->get();
        $bloques = DB::table('bloques')->get();
        $id= Auth::user()->id;
            
            $cantidadTotal = Estadistica::Cantidad();
            $cantidadResp = Estadistica::TResp();
            $mayBloques = Estadistica::MayBloques();
            $mayMotivos = Estadistica::MayMotivos();
            Estadistica::PorcBloque(); 
            Estadistica::PorcMotivos();
            Estadistica::Materias();    
            $PorcBloque = DB::table('controlEncuestasP'.$id)->get();
            $PorcMotivo = DB::table('controlEncuestasP_'.$id)->get();
            $datosMaterias = DB::table('controlEncuestasM_'.$id)->get(); 
           

            return view::make('home')->with(['n'=> 10, 'cantidadTotal'=>$cantidadTotal, 'cantidadResp'=>$cantidadResp, 'mayBloque'=>$mayBloques,  'mayMotivos'=>$mayMotivos,'porcBloque' => $PorcBloque,'PorcMotivo' => $PorcMotivo,'datosMaterias' => $datosMaterias, 'materias'=>$materias, 'encuestas' => $encuestas, 'motivos' => $motivos, 'bloques'=>$bloques]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
