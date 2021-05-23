<?php

Route::prefix('/admin')->group(function(){

    // Route::get('/','Admin\DashboardController@index')->name('admin-index');

    // FISHING REPORT
    Route::get('/','Admin\FishingReportController@index')->name('fishing-report.index');
    Route::get('/report-create','Admin\FishingReportController@create')->name('report.create');
    Route::post('/report-store','Admin\FishingReportController@store')->name('report.store');
    Route::get('/report-edit/{id}/edit','Admin\FishingReportController@edit')->name('report.edit');
    Route::patch('/report-edit/{id}','Admin\FishingReportController@update')->name('report.update');
    Route::delete('/report-destroy/{id}','Admin\FishingReportController@destroy')->name('report.destroy');

    // PANGAS ADMINISTRATION
    Route::get('/pangas','Admin\PangasController@index');
    Route::get('/show-panga/{id}','Admin\PangasController@show')->name('panga.show');
    Route::get('/create-panga','Admin\PangasController@create')->name('panga.create');
    Route::post('/store-panga','Admin\PangasController@store')->name('panga.store');
    Route::get('/edit-panga/{id}/edit','Admin\PangasController@edit')->name('panga.edit');
    Route::patch('/edit-panga/{id}','Admin\PangasController@update')->name('panga.update');
    Route::delete('/panga-destroy/{id}','Admin\PangasController@destroy')->name('panga.destroy');

    // BOAT SPECIFICATIONS ADMINISTRATION
    Route::get('/boat-specifications','Admin\BoatSpecificationsController@index');
    Route::get('/show-boat-specification/{id}','Admin\BoatSpecificationsController@show')->name('specifications.show');
    Route::get('/create-boat-specification','Admin\BoatSpecificationsController@create')->name('specifications.create');
    Route::post('/store-boat-specification','Admin\BoatSpecificationsController@store')->name('specifications.store');
    Route::get('/edit-boat-specification/{id}/edit','Admin\BoatSpecificationsController@edit')->name('specifications.edit');
    Route::patch('/edit-boat-specification/{id}','Admin\BoatSpecificationsController@update')->name('specifications.update');
    Route::patch('/edit-boat-specification/charter/{id}','Admin\BoatSpecificationsController@updateCharter')->name('specifications.update.charter');
    Route::delete('/boat-specification-destroy/{id}','Admin\BoatSpecificationsController@destroy')->name('specifications.destroy');

    // CAPTAIN INFO ADMINISTRATION
    Route::get('/captain-info','Admin\CaptainInfoController@index');
    Route::get('/show-captain-info/{id}','Admin\CaptainInfoController@show')->name('captain.show');
    Route::get('/create-captain-info','Admin\CaptainInfoController@create')->name('captain.create');
    Route::post('/store-captain-info','Admin\CaptainInfoController@store')->name('captain.store');
    Route::get('/edit-captain-info/{id}/edit','Admin\CaptainInfoController@edit')->name('captain.edit');
    Route::patch('/update-captain-info/{id}','Admin\CaptainInfoController@update')->name('captain.update');
    Route::delete('/captain-info-destroy/{id}','Admin\CaptainInfoController@destroy')->name('captain.destroy');

    // RATES ADMINISTRATION
    Route::get('/rates','Admin\RatesController@index');
    Route::get('/show-rates/{id}','Admin\RatesController@show')->name('rate.show');
    Route::get('/create-rates','Admin\RatesController@create')->name('rate.create');
    Route::post('/store-rates','Admin\RatesController@store')->name('rate.store');
    Route::get('/edit-rates/{id}/edit','Admin\RatesController@edit')->name('rate.edit');
    Route::patch('/update-rates/{id}','Admin\RatesController@update')->name('rate.update');
    Route::delete('/rates-destroy/{id}','Admin\RatesController@destroy')->name('rate.destroy');

    // CHARTERS ADMINISTRATION
    Route::get('/charters','Admin\ChartersController@index');
    Route::get('/show-charter/{id}','Admin\ChartersController@show')->name('charters.show');
    Route::get('/create-charter','Admin\ChartersController@create')->name('charters.create');
    Route::post('/store-charter','Admin\ChartersController@store')->name('charters.store');
    Route::get('/edit-charter/{id}/edit','Admin\ChartersController@edit')->name('charters.edit');
    Route::patch('/edit-charter/{id}','Admin\ChartersController@update')->name('charters.update');
    Route::delete('/destroy-charter/{id}','Admin\ChartersController@destroy')->name('charters.destroy');

    //IMAGE BOATS
    Route::post('/image_boats','Admin\ImageBoatsController@store');
    Route::post('/charters/image_boats','Admin\ChartersImageBoatsController@store');
    Route::delete('/image-boats-delete/{id}','Admin\ImageBoatsController@destroy');
    Route::delete('/charters/image-boats-delete/{id}','Admin\ChartersImageBoatsController@destroy');

});
