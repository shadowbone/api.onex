<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/',function(){
  return App\User::all();
});

$app->get('/excel', function () use ($app) {
    Excel::create('Laravel Excel', function($excel) {
        $excel->sheet('Excel sheet', function($sheet) {

            $sheet->setOrientation('landscape');

        });
    })->export('xls');
});

$app->post('auth/login', 'AuthController@postLogin');

$app->group(['middleware' => 'auth:api'], function($app)
{
    $app->get('/ahay', function() {
        return response()->json(Auth::user());
    });
});
