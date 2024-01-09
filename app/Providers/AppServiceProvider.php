<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
     Blade::directive('localeactive', function ($localecurrent) {
        $locale = session('locale');
       if($locale == trim($localecurrent, "'")){
            return  "selected";
        }
         return "";
     });

     Blade::if('admin',function(){
        $active = Auth::user()->name;
        $result = $active === 'admin' ? true : false ;
        return $result;
     });

}
}
