<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Slider;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\language;
use App\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){

            $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

            $view->with(['slider'=>$slider ]);
        
        });

         view()->composer('*',function($view){
            if(Session::has('locale')){
                 app()->setLocale(Session::get('locale'));
             }
             $language = language::get();
             $multisp = 'sp_' . app()->getLocale();
            //  dd($multisp);
             $all_product = Product::join('tbl_language', 'tbl_product.id_language', '=', 'tbl_language.id_language')->get();

             $view->with(['language'=>$language, 'multisp'=>$multisp]);
     });
    }
}
