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


Route::middleware(['IsAdmin'])->group(function () {
    // Главная страница
    Route::get('/', function () {return view('upanel.main');});
    // Спиоск всех угроз
    Route::get('/usp/treatslist','TreatsController@index');
    // Управление источников угроз
    Route::get('/usp/treatslist/manager/{id?}','TreatsController@manTreats',
        function($id=0){});
    Route::post('/usp/treatslist/manager/{id?}','TreatsController@SaveUpdateTreats',
        function($id=0){})->name('managertreats_add_save');;
    // Спиоско все источников угроз
    Route::get('/usp/treatsistochniklist','TreatsController@indexIstochnik');
    // Управление источников угроз
    Route::get('/usp/treatsistochniklist/manager/{id?}','TreatsController@manIstochnik',
        function($id=0){});
    // Добовляем или изменяем данные
    Route::post('/usp/treatsistochniklist/manager/{id?}','TreatsController@SaveUpdateIstochnik',
        function($id=0){})->name('manageristochnik_add_save');
    //Удоляем данные ( источники)
    Route::get('/usp/treatsistochniklist/delete/{id?}','TreatsController@deleteIstochnik',
        function($id=0){});
    // Спиоско все источников угроз
    Route::get('/usp/treatsposledctvies','TreatsController@indexPosledctvies');
    // Управление последствием угроз
    Route::get('/usp/treatsposledctvies/manager/{id?}','TreatsController@manPosledctvie',
        function($id=0){});
    // Добовляем или изменяем данные в таблице последствии угроз
    Route::post('/usp/treatsposledctvies/manager/{id?}','TreatsController@SaveUpdatePosledctvie',
        function($id=0){})->name('managerposledctvies_add_save');
    //Удоляем данные ( источники)
    Route::get('/usp/treatsposledctvies/delete/{id?}','TreatsController@deletePosledctvie',
        function($id=0){});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


