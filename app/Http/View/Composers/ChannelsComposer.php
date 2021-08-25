<?php

namespace App\Http\View\Composers;

use App\Models\channels;
use Illuminate\View\View;//this one is different then the one we are using in a app service provider

class ChannelsComposer
{
    public function compose(View $view)
    {
        $view->with( 'channels', channels::orderBy('name')->get()); //now we have capsulated it in its own class 
    
    }
    //we can have any other/number of methods here to perform calculations on the data 
}