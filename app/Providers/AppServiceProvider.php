<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $top10Fabricantes = DB::table('supplies')->select(DB::raw('supplies.manufacturers_id, manufacturers.slug as manufacturer_slug, manufacturers.name, count(supplies.manufacturers_id) AS total'))
        ->join('manufacturers', 'supplies.manufacturers_id', 'manufacturers.id')
        ->whereNotNull('manufacturers.name')
        ->whereNotIn('name', ['GENERICO', 'generico', 'Fabricante', 'fabricante', ''])
        ->groupBy('manufacturers_id')
        ->orderBy('total', 'DESC')
        ->take(10)
        ->get();

        View::share([
            'top10Fabricantes' => $top10Fabricantes
        ]);
        
    }
}
