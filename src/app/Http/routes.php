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
$app->get('/soal','ProjectsController@data');


$app->get('/',function(){
  return \App\MasterSoalModel::create([
  	'name' => 'Agama',
  	'keterangan' => 'ini adalah buku Agama',
  	'type' => 'Pengantar Agama Islam'
  	]);
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
        return response()->json(['status' => true],200);
    });
});

    $app->group(['prefix' => 'soal','middleware' => 'auth:api'],function($app){
    	$app->put('update','App\Http\Controllers\ProjectsController@update');
    	$app->delete('delete','App\Http\Controllers\ProjectsController@delete');
    	$app->post('create','App\Http\Controllers\ProjectsController@create');
    	$app->get('data','App\Http\Controllers\ProjectsController@data');
    });
