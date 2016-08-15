<?php

namespace App\Providers;

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
        $this->app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);
		$request = app('request');
		if ($request->isMethod('OPTIONS'))
	    {
	       app()->options($request->path(), function() {
                return response('', 200); 
            });
	    }
    }

}
