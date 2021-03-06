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


class userAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


        $users = User::Nombre($request->get('nombre'))->Cedula($request->get('cedula'))->Correo($request->get('correo'))->Ciudad($request->get('ciudad'))->Nivel($request->get('nivel'))->Rol($request->get('rol'))->Residenciado($request->get('residenciado'))->Participacion($request->get('estatus'))->orderBy('id', 'DESC')->paginate(10);

        if (empty($encuestas)) {
           return view::make('home')->with(['n'=> 8, 'usuarios'=>$usuarios, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'nuevos'=>$nuevos, 'encuestas' => 0, 'motivos' => $motivos, 'noP' => $noP, 'bloques'=>$bloques]);
        }else{
            return view::make('home')->with(['n'=> 8, 'usuarios'=>$users, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'nuevos'=>$nuevos, 'encuestas' => $encuestas, 'motivos' => $motivos, 'noP' => $noP, 'bloques'=>$bloques]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $usuario = DB::table('users')->where('id', $id)->first();
        $ciudades = DB::table('ciudades')->get();
        $aprobados = DB::table('aprobados')->get();
        $materias = DB::table('materias')->get();
        $bloques = DB::table('bloques')->get();

         return view::make('home')->with(['n'=> 11, 'usuario'=>$usuario, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'bloques'=>$bloques]);


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
        Admin::EditarUsuario($id, $request->rol, $request->nivel);

        $usuarios = DB::table('users')->orderBy('id', 'DESC')->paginate(10);
        $ciudades = DB::table('ciudades')->get();
        $aprobados = DB::table('aprobados')->get();
        $materias = DB::table('materias')->get();
        $encuestas = DB::table('encuestas')->get();
        $motivos = DB::table('motivos')->get();
        $bloques = DB::table('bloques')->get();
        $nuevos = Admin::Nuevos($usuarios);
        $noP = Admin::NoParticipantes($usuarios);


        $users = User::Nombre($request->get('nombre'))->Cedula($request->get('cedula'))->Correo($request->get('correo'))->Ciudad($request->get('ciudad'))->Nivel($request->get('nivel'))->Rol($request->get('rol'))->Residenciado($request->get('residenciado'))->Participacion($request->get('estatus'))->orderBy('id', 'DESC')->paginate(10);

        if (empty($encuestas)) {
           return view::make('home')->with(['n'=> 8, 'usuarios'=>$usuarios, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'nuevos'=>$nuevos, 'encuestas' => 0, 'motivos' => $motivos, 'noP' => $noP, 'bloques'=>$bloques]);
        }else{
            return view::make('home')->with(['n'=> 8, 'usuarios'=>$users, 'ciudades'=>$ciudades, 'aprobados'=>$aprobados,'materias'=>$materias, 'nuevos'=>$nuevos, 'encuestas' => $encuestas, 'motivos' => $motivos, 'noP' => $noP, 'bloques'=>$bloques]);

        }
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
