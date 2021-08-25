<?php

namespace App\Providers;

use App\Http\View\Composers\ChannelsComposer; //import class here
use App\Models\channels;
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
        // Option -1 - Every Single View
        //View::share('channels', channels::orderBy('name')->get());

        // Option - 2 - Specific Views/ Granular Views with wildcard

        //View Composer - Very Basics of it is that you can attach some data to specific or numver of views define in an array
        
        //here you can pass a single string (view name) or array of string(view names) and decond parameter is the callback function
        
        /*
        View::composer(['post.create','channel.index'], function ($view) {
            $view->with(
                'channels', channels::orderBy('name')->get()
            );
        });
        */

        // - directory name * means that every single view in a specific directory get this data/variable 
        /*
        View::composer(['post.*','channel.index'], function ($view) {
            $view->with(
                'channels', channels::orderBy('name')->get()
            );
        });
        */
        
        
         // Option - 3 - Dedicated Class

         // You can achieve this same thing but we can encapsulated in a class/ in its own class
        // if we have data intensive method that need lot of complex calculation 
        // This is going to be a little growsome/extremly unpleasent in side app service or any other service provider
        // so a specrate class will be benifical in this case
        // laravel documentation doesn't exactly tell where they should be craeted but they hint that it should be in http directory View->Composers-> (files)
        // Any composer class require to have one method in it. they can have as many as you wnat but the only one absolutely has to have is one called compose and it accept View(Illuminate/View)

        //View::composer(['post.create','channel.index'], ChannelsComposer::class);

        //Later down the road here comes the 3rd instance you need to use these channels in 
        //now instead of passing data to whole view we pass data only to components which uses that data and include them to the view
        View::composer(['partials.channels.*'], ChannelsComposer::class);
    }
}
