<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('navbar', function ($view) {
            $inscripciones_data = [];
            if (auth()->check()) {
                $inscripciones_data = auth()->user()->actividades()->get()->map(function($act) {
                    return [
                        'fecha' => $act->fecha,
                        'nombre' => $act->nombre,
                        'color' => \App\Models\Actividades::generarColor($act->nombre),
                        'fechaFormateada' => $act->fecha ? \Carbon\Carbon::parse($act->fecha)->format('d/m/Y') : 'Pendiente'
                    ];
                })->toArray();
            }
            $view->with('inscripciones_data', $inscripciones_data);
        });
    }
}
