<?php

Route::get("testando", function(){
	dd(\DB::select('select * from bdodsv.cidade'));
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

        Route::group(['prefix' => 'empresa' ,'middleware' => ['permission:CompanyAdmin']], function(){
            Route::get('', ['as'=> 'companies.index', 'uses' => 'CompanyController@index']);
            Route::get('api/companies', ['as'=> 'api.companies', 'uses' => 'CompanyController@apiFindAll']);
            Route::get('cadastrar', ['as' => 'companies.create', 'uses' => 'CompanyController@create']);
            Route::post('cadastrar', ['as' => 'companies.store', 'uses' => 'CompanyController@store']);
            Route::get('{id}/editar', ['as' => 'companies.edit', 'uses' => 'CompanyController@edit']);
            Route::put('{id}', ['as' => 'companies.update', 'uses' => 'CompanyController@update']);
            Route::delete('{id}', ['as' => 'companies.destroy', 'uses' => 'CompanyController@destroy']);
        });

        Route::group(['prefix' => 'canditato' ,'middleware' => ['permission:CandidateAdmin']], function(){
            Route::get('', ['as'=> 'candidates.index', 'uses' => 'CandidateController@index']);
            Route::get('api/candidates', ['as'=> 'api.candidates', 'uses' => 'CandidateController@apiFindAll']);
            Route::get('cadastrar', ['as' => 'candidates.create', 'uses' => 'CandidateController@create']);
            Route::post('cadastrar', ['as' => 'candidates.store', 'uses' => 'CandidateController@store']);
            Route::get('{id}/editar', ['as' => 'candidates.edit', 'uses' => 'CandidateController@edit']);
            Route::put('{id}', ['as' => 'candidates.update', 'uses' => 'CandidateController@update']);
            Route::delete('{id}', ['as' => 'candidates.destroy', 'uses' => 'CandidateController@destroy']);
        });

		Route::group(['prefix' => 'manual'], function(){
			Route::get('faq',['as' => 'manuals.faq', 'uses' => 'ManualController@faq']);
			Route::get('politica-de-privacidade',['as' => 'manuals.privacy', 'uses' => 'ManualController@privacy']);
		});
});
