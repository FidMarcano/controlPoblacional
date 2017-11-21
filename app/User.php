<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','email','trabaja','cedula','residencia','id_ciudad','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'estatus','rol','uc_aprobadas', 'nivel'
    ];


    static function encuestaRealizada()
    {
        DB::table('users')->where([
                                    'id'=>Auth::user()->id
                            ])->update([
                                    'estatus'=> 1
        ]);
    }


    //Sistemas de búsqueda--------------------------------------------------------------------------------------------------

    public function scopeNombre($query, $name)
    {
        if (trim($name) != "") {
            $query->where(\DB::raw("CONCAT(nombre, ' ', apellido)"), "LIKE", "%$name%");
        }
        
    }

    public function scopeCedula($query, $cedula)
    {
        if (trim($cedula) != "") {
            $query->where(\DB::raw("cedula"), "LIKE", "%$cedula%");
        }
        
    }

    public function scopeCorreo($query, $email)
    {
        if (trim($email) != "") {
            $query->where(\DB::raw("email"), "LIKE", "%$email%");
        }
        
    }

    public function scopeCiudad($query, $ciudad)
    {
        $ciudades = DB::table('ciudades')->count();
        $city = array();
        for ($i=0; $i<=$ciudades ; $i++) { 
            $city[]=$i;
        }
       
        if ($ciudad != "" && isset($city[$ciudad])) 
        {
            $query->where('id_ciudad', $ciudad);   
        }
        
    }

    public function scopeNivel($query, $nivel)
    {
        $niveles = ['0','1','2'];

        if ($nivel != "" && isset($niveles[$nivel])) 
        {
            $query->where('nivel', $nivel);   
        }
        
    }
    public function scopeParticipacion($query, $estatus)
    {
        $stati = ['0','1'];

        if ($estatus != "" && isset($stati[$estatus])) 
        {
            $query->where('estatus', $estatus);   
        }
        
    }

    public function scopeRol($query, $rol)
    {
        $roles = ['0','1','2'];

        if ($rol != "" && isset($roles[$rol])) 
        {
            $query->where('rol', $rol);   
        }
        
    }

    public function scopeResidenciado($query, $residenciado)
    {
        $res = ['0','1'];

        if ($residenciado != "" && isset($res[$residenciado])) 
        {
            $query->where('residencia', $residenciado);   
        }
        
    }
}

