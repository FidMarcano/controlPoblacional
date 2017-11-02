<?php

namespace App\Providers;

use View;
use DB;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $dt = Carbon::now();
        $n = 1;
        $fecha = $dt->toFormattedDateString();
        $ciudades = DB::table('ciudades')->get();
        View::share('ciudades',$ciudades);
        View::share('fecha',$fecha);
        View::share('n',$n);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
