<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Encuesta extends Model
{   
    static function store($materia, $bloque, $motivo)
    {
        DB::table('encuestas')->insert([
            'id_materia' => $materia,
            'id_bloque' => $bloque,
            'id_motivo'=>$motivo,
            'id_user'=>Auth::user()->id
        ]);
    }

    static function guardar($idMateria, $bloque, $motivo)
    {
        DB::table('encuestas')->where([
                                    'id_materia' => $idMateria,
                                    'id_user'=>Auth::user()->id
                            ])->update([
                                    'id_bloque' => $bloque,
                                    'id_motivo'=> $motivo
        ]);
    }


    static function formarEncuesta()
    {
    	$materias = DB::table('materias')->where('uc_minimo','<=',Auth::user()->uc_aprobadas)->get();
    	$materiast = DB::table('materias')->get();
        $aprobadas = DB::table('aprobados')->where([
            ['id_usuario', '=', Auth::user()->id],
            ['ultima', '1'],
        ])->get();

        $aprobadasI = DB::table('aprobados')->where([
            ['id_usuario', '=', Auth::user()->id],
            ['ultima', '0'],
        ])->get();
    	//materias preladas por UC
    	$xuc = array();
    	//materias preladas por preladoras
    	$xpr = array();
    	//seleccionador de nuevas materias preladas
    	$xpre = array();
    	//Seleccionador de una sola rama
    	$xf = array();


    	$materiasF = array();



    	//Se llenan las preladas por UC
    	foreach ($materias as $m) {
    		foreach ($aprobadas as $a) {
	    		if ($m->id != $a->id_materia) {
					$xuc[]=$m->id;    				
	    		}
	   		}
    	}

    	//Se seleccionan las materias que ha aprobado el usuario del total, para poder obtener sus preladoras (de las materias)

    	foreach ($materiast as $m) {
    		foreach ($aprobadas as $a) {
    			if ($m->id == $a->id_materia) {
                    $xpr[]=$m->id;
    			}
    		}
    	}

    	//Se toman las nuevas materias que han sido preladas por el usuario

    	foreach ($xpr as $xp) {
    		foreach ($materiast as $m) {
				if ($m->preladora == $xp) {
					$xpre[] = $m->id;
				}
    		}	
    	}

    	


    	//Se unen los array finales, por la UC y por las preladas

    	$materiasPreladas = array_merge ($xpre,$xuc);

        foreach ($materiasPreladas as $m) {
            foreach ($aprobadasI as $a) {
                if ($m != $a->id_materia) {
                    $xf[]= $m;
                }    
            }

        }
        
       	//Se elminan los números repetidos

    	return $materiasFinales = array_unique($xf);


    }
}
