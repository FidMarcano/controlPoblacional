<?php

use Illuminate\Database\Seeder;

class materiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// Primer semestre
        DB::table('materias')->insert([
        
	    	'materia' => 'fundamentos de la informatica',
	    	'uc'=>'3'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'formacion constitucional',
	    	'uc'=>'2'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'ingles I',
	    	'uc'=>'2'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'deporte',
	    	'uc'=>'2'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'logica matematica',
	    	'uc'=>'3'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'matematica I',
	    	'uc'=>'5'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'lenguaje y comunicacion',
	    	'uc'=>'2'
    	]);

    	//Segundo semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'arte y cultura',
	    	'uc'=>'2'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'ingles II',
	    	'uc'=>'2',
            'preladora' => '3'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'problematica cientifica tecnologica',
	    	'uc'=>'2',
            'uc_minimo'=>'13'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva I (conducta humana)',
	    	'uc'=>'2',
            'uc_minimo' => '13'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'fisica I',
	    	'uc'=>'4',
            'preladora'=>'6'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'matematica II',
	    	'uc'=>'5',
            'preladora'=>'6'
    	]);

    	DB::table('materias')->insert([
        
	    	'materia' => 'algoritmos I',
	    	'uc'=>'3',
            'preladora'=>'5'
    	]);

    	//Tercer semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'metodologia y tecnicas de investigacion',
	    	'uc'=>'2',
            'uc_minimo' => '30'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva II (legislacion informatica)',
	    	'uc'=>'2',
            'preladora'=>'11'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'programacion I',
	    	'uc'=>'4',
            'preladora'=> '14'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'matematica III',
	    	'uc'=>'5',
            'preladora'=> '13'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'fisica II',
	    	'uc'=>'4',
            'preladora'=>'12'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'algoritmos II',
	    	'uc'=>'3',
            'preladora'=>'14'
    	]);

    	//Cuarto semestre 

    	DB::table('materias')->insert([
        
	    	'materia' => 'estructuras discretas I',
	    	'uc'=>'4',
            'preladora'=>'20'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'base de datos',
	    	'uc'=>'3',
            'preladora'=>'17'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'programacion II',
	    	'uc'=>'4',
            'preladora'=>'17'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'probabilidades y estadistica',
	    	'uc'=>'3',
            'preladora'=>'18'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'matematica IV',
	    	'uc'=>'5',
            'preladora'=>'18'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva III (mantenimiento del computador)',
	    	'uc'=>'2',
            'preladora'=>'16'
    	]);


    	//Quinto semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'organizacion del computador',
	    	'uc'=>'5',
            'preladora'=>'19'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'algebra booleana',
	    	'uc'=>'3',
            'preladora'=>'21'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'estructuras discretas II',
	    	'uc'=>'4',
            'preladora'=>'21'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'programacion III',
	    	'uc'=>'4',
            'preladora'=>'23'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva IV (teleinformatica)',
	    	'uc'=>'2',
            'preladora'=>'26'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'teoria de sistemas',
	    	'uc'=>'2',
            'uc_minimo'=>'50'
    	]);

    	//Sexto semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'investigacion de operaciones',
	    	'uc'=>'4',
            'preladora'=>'24'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'arquitectura del computador',
	    	'uc'=>'4',
            'preladora'=>'27'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'sistemas de informacion I',
	    	'uc'=>'5',
            'preladora'=>'32'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'metodos numericos',
	    	'uc'=>'4',
            'preladora'=> '25'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'ingenieria economica',
	    	'uc'=>'2',
            'uc_minimo'=>'70'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva V (inteligencia artificial)',
	    	'uc'=>'2',
            'preladora'=> '31'
    	]);

    	//Séptimo semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'control de proyectos',
	    	'uc'=>'4',
            'uc_minimo'=>'86'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'organizacion y gestion empresarial',
	    	'uc'=>'4',
            'uc_minimo'=>'86'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'sistemas operativos',
	    	'uc'=>'4',
            'preladora' => '34'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'traductores e interpretes',
	    	'uc'=>'4',
            'preladora'=>'29'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'sistemas de informacion II',
	    	'uc'=>'5',
            'preladora'=>'35'
    	]);

    	//Octacvo semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'redes',
	    	'uc'=>'4',
            'preladora'=>'41'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva de area I',
	    	'uc'=>'4',
            'uc_minimo'=>'100'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'pasantia',
	    	'uc'=>'4',
            'preladora'=>'39'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'lenguaje de programacion',
	    	'uc'=>'4',
            'preladora'=>'42'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'sistemas de informacion III',
	    	'uc'=>'5',
            'preladora'=> '43'
    	]);

    	//Noveno semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva de area II',
	    	'uc'=>'4',
            'preladora'=> '45'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'sistemas distribuidos',
	    	'uc'=>'4',
            'preladora'=> '44'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'etica profesional',
	    	'uc'=>'2',
            'preladora'=> '43'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva libre I',
	    	'uc'=>'4',
            'uc_minimo'=>'136'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'proyecto de grado I',
	    	'uc'=>'4',
            'uc_minimo'=>'157'
    	]);

    	//Decimo semestre

    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva de area III',
	    	'uc'=>'4',
            'preladora'=>'49'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'electiva libre II',
	    	'uc'=>'3',
            'uc_minimo'=> '157'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'informatica educativa',
	    	'uc'=>'3',
            'uc_minimo'=>'157'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'proyecto de grado II',
	    	'uc'=>'4',
            'preladora'=> '53'
    	]);
    	DB::table('materias')->insert([
        
	    	'materia' => 'gerencia de proyecto',
	    	'uc'=>'3',
            'preladora'=>'46'
    	]);
    }
}
