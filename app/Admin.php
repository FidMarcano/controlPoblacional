<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Admin extends Model
{
    static function Nuevos($usuarios)
    {	
    	$nuevos = array();
    	foreach ($usuarios as $u) {
            $user = DB::table('aprobados')->where('id_usuario',$u->id)->count();

            if ($user < 1) {
        	    $nuevos[] = $u->id;
            }
        }

        return $nuevos;
    }

    static function NoParticipantes($usuarios)
    {	

      	$noP = array();
		
		foreach ($usuarios as $u) {
            $NP = DB::table('encuestas')->where('id_user',$u->id)->count();
    
            if ($NP == 0) {
                $noP[] = $u->id;
	        }
        }


        return $noP;
    }


    //Editar usuario desde el admin----------------------------------------------------------------------------------------

    static function EditarUsuario($id, $rol, $nivel)
    {   
        DB::table('users')
            ->where('id', $id)
            ->update(['rol' => $rol,'nivel' => $nivel]);

    }

}