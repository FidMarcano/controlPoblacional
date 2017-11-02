<?php

namespace App\Http\ViewComposer;
use Illuminate\View\View;
use DB;

class registerComposer 
{
    public function compose(View $view)
    {
        $ciudades = DB::table('ciudades')->get();
        $view->with('ciudades',$ciudades);
    }
}