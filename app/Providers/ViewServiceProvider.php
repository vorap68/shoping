<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'],function($view){
            $view->with(['categories' => Category::get()]);
        });

        // View::composer(['*'],function($view){
        //     $view->with(['currentUrl' => Category::get()]);
        // })
}
}
