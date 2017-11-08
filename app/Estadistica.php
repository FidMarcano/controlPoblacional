<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Estadistica extends Model
{
    static function Cantidad()
    {	
    	
    	$cantidad = DB::table('encuestas')->get();
    	$brutos = array();
    	$netos = array();
    	foreach ($cantidad as $c) {
    		$brutos[]= $c->id_user;
    	}

    	$netos = array_unique($brutos);

    	$cantidadTotal = count($netos)-1;
    	
        return $cantidadTotal;
    }

    static function TResp()
    {	
    	
    	$total = DB::table('encuestas')->get();
    	$cantidadTotal = count($total)-1;
    	
        return $cantidadTotal;
    }



    static function MayBloques()
    {	
    	$encuestas = DB::table('encuestas')->where('id_bloque','<>',0)->get();
    	$mayor = 0;
    	$cantidad = 0;
    	$id = Auth::user()->id;
    	
    	Schema::create('controlEncuestas'.$id, function (Blueprint $table) {
	            $table->increments('id');
	            $table->tinyInteger('id_bloque');
	            $table->integer('cantidad');
        });

        foreach ($encuestas as $e) {

        	$cantidad = DB::table('encuestas')->where('id_bloque',$e->id_bloque)->count();

        	DB::table('controlEncuestas'.$id)->insert([
        		'id_bloque'=>$e->id_bloque,
        		'cantidad' =>$cantidad
        	]);

        	$cantidad = 0;
        }

        $bloque = DB::table('controlEncuestas'.$id)
                ->orderBy('cantidad', 'desc')
                ->first();
       	
       	$mayor = DB::table('encuestas')->where('id_bloque',$bloque->id_bloque)->first();

        Schema::dropIfExists('controlEncuestas'.$id);

        return $mayor;
   	}

   	//Mayor motivo seleccionado------------------------------------------------------------------------------------------------

   	static function MayMotivos()
    {	
    	$encuestas = DB::table('encuestas')->where('id_motivo','<>',0)->get();
    	$total = DB::table('encuestas')->where('id_motivo','<>',0)->count();
    	$mayor = 0;
    	$cantidad = 0;
    	$id = Auth::user()->id;
    	
    	Schema::create('controlEncuestas1'.$id, function (Blueprint $table) {
	        $table->increments('id');
	        $table->tinyInteger('id_motivo');
	        $table->integer('cantidad');
        });

        foreach ($encuestas as $e) {

        	$cantidad = DB::table('encuestas')->where('id_motivo',$e->id_motivo)->count();

        	DB::table('controlEncuestas1'.$id)->insert([
        		'id_motivo'=>$e->id_motivo,
        		'cantidad' =>$cantidad
        	]);

        	$cantidad = 0;
        }

        $bloque = DB::table('controlEncuestas1'.$id)
                ->orderBy('cantidad', 'desc')
                ->first();

        $mayor = DB::table('encuestas')->where('id_motivo',$bloque->id_motivo)->first();

        Schema::dropIfExists('controlEncuestas1'.$id);

        return $mayor;
   	}


   	//Porcentaje de bloques-------------------------------------------------------------------------------------------------------

   	static function PorcBloque()
    {	
    	$encuestas = DB::table('encuestas')->where('id_bloque','<>',0)->get();
    	$cantidad = 0;
    	$porcentaje = 0;
    	$id= Auth::user()->id;

    	

    	Schema::dropIfExists('controlEncuestasP'.$id);
    	Schema::create('controlEncuestasP'.$id, function (Blueprint $table) {
	            $table->increments('id');
	            $table->tinyInteger('id_bloque');
	            $table->integer('porcentaje');
        });

    	Estadistica::ContarBloques($encuestas);
    }

    //Porcentaje de Motivos------------------------------------------------------------------------------------------------------------

  	static function PorcMotivos()
    {	
    	$encuestas = DB::table('encuestas')->where('id_motivo','<>',0)->get();
    	$cantidad = 0;
    	$porcentaje = 0;
    	$id= Auth::user()->id;

    	

    	Schema::dropIfExists('controlEncuestasP_'.$id);
    	Schema::create('controlEncuestasP_'.$id, function (Blueprint $table) {
	            $table->increments('id');
	            $table->tinyInteger('id_motivo');
	            $table->integer('porcentaje');
        });

    	Estadistica::ContarMotivos($encuestas);
    }





   	static function ContarBloques($encuestas)
    {	
    	
    	
    	$total = DB::table('encuestas')->where('id_bloque','<>',0)->count();
    	$id= Auth::user()->id;
    	//Hay que crear variables para cada bloque
    	$b1 = 0;
    	$p1 = 0;
    	$b2 = 0;
    	$p2 = 0;
    	$b3 = 0;
    	$p3 = 0;
    	$b4 = 0;
    	$p4 = 0;

    	foreach ($encuestas as $e) {
    	
    		if ($e->id_bloque == 1) {
    			$b1++;
    		}
    		if ($e->id_bloque == 2) {
    			$b2++;
    		}
    		if ($e->id_bloque == 3) {
    			$b3++;
    		}
    		if ($e->id_bloque == 4) {
				$b4++;
    		}
    	}

    	//Se calculan los porcentajes
    	$p1 = ($b1 * 100)/$total;
    	$p2 = ($b2 * 100)/$total;
    	$p3 = ($b3 * 100)/$total;
    	$p4 = ($b4 * 100)/$total;

    	//Se ingresan los valores en la tabla 

    	DB::table('controlEncuestasP'.$id)->insert([
            'id_bloque' => 1,
        	'porcentaje' => $p1,
        ]);
        DB::table('controlEncuestasP'.$id)->insert([
            'id_bloque' => 2,
        	'porcentaje' => $p2,
        ]);
        DB::table('controlEncuestasP'.$id)->insert([
            'id_bloque' => 3,
        	'porcentaje' => $p3,
        ]);
        DB::table('controlEncuestasP'.$id)->insert([
            'id_bloque' => 4,
        	'porcentaje' => $p4,
        ]);
    }


    static function ContarMotivos($encuestas)
    {	
    	
    	
    	$total = DB::table('encuestas')->where('id_motivo','<>',0)->count();
    	$id= Auth::user()->id;
    	//Hay que crear variables para cada bloque
    	$b1 = 0;
    	$p1 = 0;
    	$b2 = 0;
    	$p2 = 0;
    	$b3 = 0;
    	$p3 = 0;
    	$b4 = 0;
    	$p4 = 0;

    	foreach ($encuestas as $e) {
    	
    		if ($e->id_motivo == 1) {
    			$b1++;
    		}
    		if ($e->id_motivo == 2) {
    			$b2++;
    		}
    		if ($e->id_motivo == 3) {
    			$b3++;
    		}
    		if ($e->id_motivo == 4) {
				$b4++;
    		}
    	}

    	//Se calculan los porcentajes
    	$p1 = ($b1 * 100)/$total;
    	$p2 = ($b2 * 100)/$total;
    	$p3 = ($b3 * 100)/$total;
    	$p4 = ($b4 * 100)/$total;

    	//Se ingresan los valores en la tabla 

    	DB::table('controlEncuestasP_'.$id)->insert([
            'id_motivo' => 1,
        	'porcentaje' => $p1,
        ]);
        DB::table('controlEncuestasP_'.$id)->insert([
            'id_motivo' => 2,
        	'porcentaje' => $p2,
        ]);
        DB::table('controlEncuestasP_'.$id)->insert([
            'id_motivo' => 3,
        	'porcentaje' => $p3,
        ]);
        DB::table('controlEncuestasP_'.$id)->insert([
            'id_motivo' => 4,
        	'porcentaje' => $p4,
        ]);
    }


    //Contador de estadísticas de materias

    static function Materias()
    {
    	
    	$id= Auth::user()->id;

		Schema::dropIfExists('controlEncuestasM_'.$id);
    	Schema::create('controlEncuestasM_'.$id, function (Blueprint $table) {
	            $table->increments('id');
	            $table->tinyInteger('id_materia');
	            $table->integer('id_motivo');
	            $table->integer('id_bloque');
        });


        Estadistica::ContarMaterias();
    }


    static function ContarMaterias()
    {	
    	$encuestas = DB::table('encuestas')->where('id_materia','<>',0)->get();
    	
    	$blo = DB::table('bloques')->get();
    	$id= Auth::user()->id;
    	$bloque = 0;
    	
    	$bloques = 0;
    	

    	Schema::dropIfExists('controlEncuestasM1_'.$id);
		Schema::dropIfExists('controlEncuestasM2_'.$id);
    	
    	

		
		
        Estadistica::GuardarMaterias($id, $encuestas);
        Estadistica::motivoMayor($id, $encuestas);
        Estadistica::bloqueMayor($id, $encuestas);

	    

		
		
	
    }

    static function GuardarMaterias($id, $encuestas)
    {
    	
    	//Se eliminan las repeticiones de ID para la cuenta------------------------------------------------------------
    	foreach ($encuestas as $e) {
    		$materias1[]= $e->id_materia;
    	}
    	$mu = array_unique($materias1);

    	foreach ($mu as $m) {
    		
    		DB::table('controlEncuestasM_'.$id)->insert([
						            'id_materia' => $m,
						            'id_motivo' => 0,
						            'id_bloque' => 0
					       		]);

    	}
    }

    



    static function motivoMayor($id, $encuestas)
    {
    	$materias = DB::table('controlEncuestasM_'.$id)->get();
    	$mot = DB::table('motivos')->get();
    	$motivo = 0;
    	$motivos1 = 0;

    	Schema::create('controlEncuestasM1_'.$id, function (Blueprint $table) {
	        $table->increments('id');
	        $table->tinyInteger('id_motivo');
	        $table->tinyInteger('id_materia');
	        $table->integer('cantidad');
        });

    	foreach ($materias as $ma) {
    		foreach ($mot as $mo) {
    			$motivos = DB::table('encuestas')->where([
    				['id_materia', $ma->id_materia],
    				['id_motivo', $mo->id]
    			])->count();
    			
    			if ($motivos > 0) {
    				DB::table('controlEncuestasM1_'.$id)->insert([
			            'id_materia' => $ma->id_materia,
			        	'id_motivo' => $mo->id,
			        	'cantidad' => $motivos
			        ]);

			        $motivo = DB::table('controlEncuestasM1_'.$id)->where('id_materia', $ma->id_materia)->orderBy('cantidad', 'desc')->first();

		    		DB::table('controlEncuestasM_'.$id)->where('id_materia',$ma->id_materia)->update([
					        	'id_motivo' => $motivo->id_motivo
					        ]);
    			}
    			
    		}
    		
    	}

    	
        Schema::dropIfExists('controlEncuestasM1_'.$id);

    }

    static function bloqueMayor($id, $encuestas)
    {
    	$materias = DB::table('controlEncuestasM_'.$id)->get();
    	$bloq = DB::table('bloques')->get();
    	$motivo = 0;
    	$motivos1 = 0;


        Schema::create('controlEncuestasM2_'.$id, function (Blueprint $table) {
	        $table->increments('id');
	        $table->tinyInteger('id_bloque');
	        $table->tinyInteger('id_materia');
	        $table->integer('cantidad');
        });

    	foreach ($materias as $ma) {
    		foreach ($bloq as $b) {
    			$bloques = DB::table('encuestas')->where([
    				['id_materia', $ma->id_materia],
    				['id_bloque', $b->id]
    			])->count();
    			
    			if ($bloques > 0) {
    				DB::table('controlEncuestasM2_'.$id)->insert([
			            'id_materia' => $ma->id_materia,
			        	'id_bloque' => $b->id,
			        	'cantidad' => $bloques
			        ]);

			        $bloque = DB::table('controlEncuestasM2_'.$id)->where('id_materia', $ma->id_materia)->orderBy('cantidad', 'desc')->first();

		    		DB::table('controlEncuestasM_'.$id)->where('id_materia',$ma->id_materia)->update([
					        	'id_bloque' => $bloque->id_bloque
					        ]);
    			}
    			
    		}
    		
    	}

    	
    	Schema::dropIfExists('controlEncuestasM2_'.$id);
    }
}
