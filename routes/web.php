<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("testando", function(){
	dd(\DB::select('select * from empresa')->get());
});
Route::group(['prefix' => 'bancodeoportunidades'], function() {

        Route::get('/',['as' => 'publishing.index', 'uses' => 'PublishingController@index']);

        // Route::group(['prefix' => 'administrador' ,'middleware' => ['permission:publishingVehicle-administration']], function(){
        //     Route::get('', ['as'=> 'administration.publishing-vehicles.index', 'uses' => 'PublishingVehicleController@index']);
        //     Route::get('api/publishing-vehicles', ['as'=> 'api.publishing-vehicles', 'uses' => 'PublishingVehicleController@apiFindAll']);
        //     Route::get('cadastrar', ['as' => 'administration.publishing-vehicles.create', 'uses' => 'PublishingVehicleController@create']);
        //     Route::post('cadastrar', ['as' => 'administration.publishing-vehicles.store', 'uses' => 'PublishingVehicleController@store']);
        //     Route::get('{id}/editar', ['as' => 'administration.publishing-vehicles.edit', 'uses' => 'PublishingVehicleController@edit']);
        //     Route::put('{id}', ['as' => 'administration.publishing-vehicles.update', 'uses' => 'PublishingVehicleController@update']);
        //     Route::delete('{id}', ['as' => 'administration.publishing-vehicles.destroy', 'uses' => 'PublishingVehicleController@destroy']);
        // });
        //
        // Route::group(['prefix' => 'empresa' ,'middleware' => ['permission:publishingVehicle-administration']], function(){
        //     Route::get('', ['as'=> 'administration.publishing-vehicles.index', 'uses' => 'PublishingVehicleController@index']);
        //     Route::get('api/publishing-vehicles', ['as'=> 'api.publishing-vehicles', 'uses' => 'PublishingVehicleController@apiFindAll']);
        //     Route::get('cadastrar', ['as' => 'administration.publishing-vehicles.create', 'uses' => 'PublishingVehicleController@create']);
        //     Route::post('cadastrar', ['as' => 'administration.publishing-vehicles.store', 'uses' => 'PublishingVehicleController@store']);
        //     Route::get('{id}/editar', ['as' => 'administration.publishing-vehicles.edit', 'uses' => 'PublishingVehicleController@edit']);
        //     Route::put('{id}', ['as' => 'administration.publishing-vehicles.update', 'uses' => 'PublishingVehicleController@update']);
        //     Route::delete('{id}', ['as' => 'administration.publishing-vehicles.destroy', 'uses' => 'PublishingVehicleController@destroy']);
        // });
        //
        // Route::group(['prefix' => 'canditato' ,'middleware' => ['permission:publishingVehicle-administration']], function(){
        //     Route::get('', ['as'=> 'administration.publishing-vehicles.index', 'uses' => 'PublishingVehicleController@index']);
        //     Route::get('api/publishing-vehicles', ['as'=> 'api.publishing-vehicles', 'uses' => 'PublishingVehicleController@apiFindAll']);
        //     Route::get('cadastrar', ['as' => 'administration.publishing-vehicles.create', 'uses' => 'PublishingVehicleController@create']);
        //     Route::post('cadastrar', ['as' => 'administration.publishing-vehicles.store', 'uses' => 'PublishingVehicleController@store']);
        //     Route::get('{id}/editar', ['as' => 'administration.publishing-vehicles.edit', 'uses' => 'PublishingVehicleController@edit']);
        //     Route::put('{id}', ['as' => 'administration.publishing-vehicles.update', 'uses' => 'PublishingVehicleController@update']);
        //     Route::delete('{id}', ['as' => 'administration.publishing-vehicles.destroy', 'uses' => 'PublishingVehicleController@destroy']);
        // });
});
